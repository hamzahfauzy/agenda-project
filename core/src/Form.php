<?php

namespace Core;

class Form
{
    static function input($type,$name,$attribute = [])
    {
        $attr = '';
        $vals = isset($attribute['value']) ? $attribute['value'] : '';
        if($type == 'date' && !isset($attribute['value'])) $attribute['value'] = date('Y-m-d');
        foreach($attribute as $key => $value)
        {
            if(!is_array($value))
                $attr .= " $key='$value'";
        }
        
        if($type == 'textarea')
        {
            return self::textarea($name, $vals, $attr);
        }

        if(substr($type,0,8) == 'checkbox')
        {
            $types = explode(':',$type);
            $options = $types[1];
            $vals = explode(',',$vals);
            
            if(substr($type, 9,3) == 'obj')
            {
                $obj_array = explode(',',$options);
                $options = $obj_array[0];

                $conn = conn();
                $db   = new Database($conn);
                $datas = $db->all($options);
                $options = $datas;
                $group = "";
                foreach($options as $option)
                {
                    $group .= self::checkbox($option->{$obj_array[2]}, $name, $option->{$obj_array[1]}, in_array($option->{$obj_array[1]},$vals));
                }
            }
            else
            {
                $options = explode('|',$options);
                $group = "";
                foreach($options as $option)
                    $group .= self::checkbox($option, $name, $option, in_array($option,$vals));
            }
            
            return "<div>$group</div>";
        }

        $lists = "";
        if(substr($type,0,7) == 'options')
        {
            $types = explode(':',$type);
            $options = $types[1];
            
            if(substr($type, 8,3) == 'obj')
            {
                $obj_array = explode(',',$options);
                $options = $obj_array[0];

                $last_params = array_slice($obj_array, 2);
                $last_params = implode(',',$last_params);

                $clause = explode('|',$last_params);
                $_clause = [];
                if(isset($clause[1]))
                {
                    $last_params = $clause[0];
                    if(substr($clause[1], 0, 3) == 'RAW')
                    {
                        $_clause = str_replace('RAW(','',$clause[1]);
                        $_clause = substr($_clause, 0, -1);
                    }
                    else
                    {
                        $clause = explode(',',$clause[1]);
    
                        foreach($clause as $k => $c)
                        {
                            $n = $k+1;
                            if($n%2==0) continue;
                            $_clause[$c] = $clause[$n];
                        }
                    }
                }

                $conn = conn();
                $db   = new Database($conn);
                $clause = !empty($_clause) ? 'WHERE ' . $db->build_clause($_clause) : '';
                $db->query = "SELECT $obj_array[1] as id, $last_params as value FROM `$options` $clause";
                $datas = $db->exec('all');
                $options = $datas;
                $lists .= "<option value=''>- Pilih -</option>";
                foreach($options as $option)
                {
                    $selected = $option->id==$vals;
                    if(isset($attribute['multiple']) && is_array($vals))
                    {
                        $selected = in_array($option->id, $vals);
                    }
                    $lists .= "<option value='".$option->id."' ".($selected?'selected=""':'').">".$option->value."</option>";
                }
            }
            else
            {
                $options = str_replace('options:','', $type);
                if(isJson($options))
                {
                    $options = json_decode($options);
                    foreach($options as $key => $val)
                        $lists .= "<option value='$val' ".($val==$vals?'selected=""':'').">$key</option>";
                }
                else
                {
                    $options = explode('|',$options);
                    foreach($options as $option)
                        $lists .= "<option value='$option' ".($option==$vals?'selected=""':'').">$option</option>";
                }
            }
            
            return self::options($name, $lists, $attr);
        }

        if($type == 'number')
        {
            $attr .= " step='any'";
        }

        return self::text($type,$name,$attr);
    }

    static function text($type,$name, $attr = "")
    {
        return "<input type='$type' name='$name' $attr>";
    }

    static function textarea($name, $value, $attr = "")
    {
        return "<textarea name='$name' $attr>$value</textarea>";
    }

    static function options($name, $lists, $attr = "")
    {
        return "<select name='$name' $attr>$lists</select>";
    }

    static function checkbox($label, $name, $value, $checked = false)
    {
        $attr = " value='$value' ".($checked?'checked':'');
        return "<label style='font-weight:400'>".self::text('checkbox', $name.'[]', $attr)." $label</label><br>";
    }

    static function getData($type, $index, $field = false)
    {
        if(!$index) return '';
        if(substr($type,0,7) == 'options')
        {
            $types = explode(':',$type);
            $options = $types[1];
            if(substr($type, 8,3) == 'obj')
            {
                $obj_array = explode(',',$options);
                $options = $obj_array[0];

                $conn = conn();
                $db   = new Database($conn);
                $data = $db->single($options,[
                    $obj_array[1] => $index
                ]);
                return $data->{$obj_array[2]};
            }
        }

        if(substr($type,0,8) == 'checkbox')
        {
            $types = explode(':',$type);
            $options = $types[1];
            if(substr($type, 9,3) == 'obj')
            {
                $obj_array = explode(',',$options);
                $options = $obj_array[0];

                $conn = conn();
                $db   = new Database($conn);
                $data = $db->single($options,[
                    $obj_array[1] => $index
                ]);
                return $data->{$obj_array[2]};
            }
        }

        if($type == 'date')
        {
            return date(app('date_format'), strtotime($index));
        }
        
        if($type == 'datetime-local')
        {
            return date(app('datetime_format'), strtotime($index));
        }

        return $index;
    }
}