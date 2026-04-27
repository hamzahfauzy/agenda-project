<?php
use Core\Page;
Page::setActive('agenda.disposisi');
Page::setTitle('Disposisi');
Page::pushFoot('<script src="https://unpkg.com/lucide@latest"></script><script>lucide.createIcons();</script>');
return view('agenda/views/disposisi');