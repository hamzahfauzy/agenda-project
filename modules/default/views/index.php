<?php get_header() ?>
<div class="mt-3">
    <h4>Selamat Datang <?=auth()->name?></h4>

    <?= \Modules\Default\Libraries\Sdk\Dashboard::render() ?>
</div>

<style>
.timeline-footer {
    padding-top:10px;
    padding-bottom:10px;
    border-top:1px solid #eaeaea;
}
.timeline-footer button {
    border:0;
    background:transparent;
    cursor: pointer;
}
.timeline-footer button.like:hover, .timeline-footer button.like.active {
    color: var(--green) !important;
}
.timeline-footer button.dislike:hover, .timeline-footer button.dislike.active {
    color: var(--red) !important;
}
.timeline-footer a:hover {
    color: var(--blue) !important;
}
.timeline-footer a {
    text-decoration:none;
}
.timeline-footer a, .timeline-footer button {
    padding-right:10px;
}
.timeline>li>.timeline-panel {
    padding:0;
}
.timeline-heading {
    border-bottom:1px solid #eaeaea;
}
.timeline-heading,.timeline-footer,.timeline-body {
    padding:20px;
}
</style>
<style>.timeline-panel{background: #FFF;border: 1px solid #eaeaea;max-width:720px;margin-left:auto;margin-right:auto;margin-bottom:15px;}</style>
<style>.timeline-panel{background: #FFF;border: 1px solid #eaeaea;max-width:720px;margin-left:auto;margin-right:auto;margin-bottom:15px;}</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Posting Timeline</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="posting-timeline" method="post" action="<?=routeTo('timeline/post')?>" id="posting_timeline" name="posting_timeline" enctype="multipart/form-data">
                <?=csrf_field()?>
                <div class="form-group mb-2">
                    <label for="">Konten</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" style="resize:none;" placeholder="Konten timeline anda disini..."></textarea>
                </div>
                <div class="form-group">
                    <label for="">Berkas</label>
                    <input type="file"  id="fileinput" class="form-control" name="files[]" multiple="multiple" accept="image/jpeg,image/gif,image/png">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-post-submit" onclick="submitPost()">Simpan</button>
        </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="page-inner">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Posting Timeline
        </button>
        <p></p>
        <div class="row">
            <div class="col-md-12 all-timeline-content">
            </div>
        </div>
    </div>
</div>
<script>
// check new post trigger
var lastPostId       = 0
var new_post_trigger = null
function submitPost()
{
    var input = document.getElementById('fileinput');
    if (input.files.length) {
        // var file = input.files[0];
        // addPara("File " + file.name + " is " +  + " bytes in size");
        // console.log(input.files)
        var isValidated = true
        for(var i=0;i<input.files.length;i++)
        {
            var file = input.files[i];
            var fileSize = file.size/1024/1024
            if(fileSize > 1)
            {
                isValidated = false
                break
            }
        }

        if(!isValidated)
        {
            alert("File tidak boleh lebih dari 1Mb")
            return
        }
    }

    var formData = new FormData(posting_timeline)
    $('.btn-post-submit').html('Memproses...')
    fetch('/agenda/timeline/submit-post',{
        method:'POST',
        body:formData
    }).then(res => {
        if(res.ok)
        {
            $('#exampleModal').modal('hide')
            $('.btn-post-submit').html('Submit')
            posting_timeline.reset()
            return res.json()
        }
    })
    return false

    // posting_timeline.submit();
}

async function newPostTrigger()
{
    var request = await fetch('/agenda/timeline/get-all-posts')
    if(request.ok)
    {
        var response = await request.json()
        if(response.data && response.data[0].id != lastPostId)
        {
            var allTimelineContent = document.querySelector('.all-timeline-content')
            var oldContent = allTimelineContent.innerHTML
            var newContent = ""
            for(var i = 0; i < response.data.length; i++)
            {
                var post = response.data[i]
                if(post.id == lastPostId) break
                newContent += `
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <a href="/agenda/timeline/detail?id=${post.id}">
                            <h4 class="timeline-title"><b>${post.user.name} - <small class="text-muted">${post.date}</small></b></h4>
                            </a>
                        </div>
                        <div class="timeline-body">
                            <p>${nl2br(post.content)}</p>`
                            if(post.files)
                            {
                            newContent += `
                            <p>
                                <br>
                            </p>
                            <div class="grid-container">
                                `
                                var files_counter = post.files.length
                                var _class = files_counter == 1 ? 'w-6 h-3' : ''
                                _class = files_counter == 2 ? 'w-3 h-2' : _class;
                                for(var j = 0; j<post.files.length; j++)
                                {
                                    var file = post.files[j]
                                    var file_index = file.id
                                    var c = _class; 
                                    if(c == '')
                                    {
                                        if((file_index+1) % 5 == 1)
                                        c = 'w-3 h-3';
                                        else if((file_index+1) % 5 == 2)
                                        c = 'w-3 h-2';  
                                    }
                                newContent += `<div class="gallery-container ${c}">
                                    <div class="gallery-item">
                                        <div class="images"><img src="${asset(file.file_url)}" alt="${post.user.name} - ${file_index+1}">
                                        </div>
                                        <div class="title">${post.user.name} - ${file_index+1}</div>
                                    </div>
                                </div>`
                                }
                            newContent += `</div>`
                            }
                        newContent += `</div>
                        <div class="timeline-footer">
                            <a href="/agenda/timeline/detail?id=${post.id}" class="text-muted">
                                <i class="fas fa-fw fa-comments"></i> Komentar (${post.comment_count})
                            </a>
                        </div>
                    </div>
`
            }
            allTimelineContent.innerHTML = newContent + oldContent
            lastPostId = response.data[0].id

        }

    }
}
function nl2br (str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function asset(path)
{
    return "<?=asset('')?>"+path
}

new_post_trigger = setInterval(newPostTrigger, 2000)
</script>
<?php get_footer() ?>