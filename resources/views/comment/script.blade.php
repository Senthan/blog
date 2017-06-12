<script>
    var baseUrl = '{{ url()->to('/') }}';

    var replyClick = function () {
        $('.clickReply').on('click', function () {
            var reply = $(this);
            var commentHolder = reply.parent().parent().parent();
            var formTemplate = $('.formTemplate .ui.comments').clone();
            formTemplate.find('input[name="parent_id"]').val(commentHolder.data('id'));
            $('#comments').find('.comments form').parent().remove();
            commentHolder.append(formTemplate);
        });
    };
    replyClick();
    var model = $('input[name="model"]').val();
    var commentHolder = $('.commentHolderTemplate').find('.comments');
    var comment = $('.commentTemplate').find('.comment');
    var viewMoreClick = function () {
        $('.viewMore.reply').on('click', function() {
            var viewMore = $(this);
            viewMore.unbind("click");
            $.ajax({
                url: '{{ route('comments.get', [$modelId]) }}' + '?ajax=true&model=' + model +'&parent=' + viewMore.parent().parent().parent().data('id'),
                method: 'GET',
            }).done(function(data) {
                var tempHolder = commentHolder.clone();
                $.each(data, function(i, block){
                    var commentBlock = comment.clone();
                    commentBlock.find('.avatar img').attr('src', baseUrl + '/profile-image/' + block.user.id);
                    commentBlock.find('.content .author').text(block.user.name);
                    commentBlock.find('.content .text').text(block.comment);
                    commentBlock.find('.metadata .date').text(block.ago.replace('before', 'ago'));
                    commentBlock.attr('data-id', block.id);
                    if(block.child > 0){
                        commentBlock.find('.viewMore.reply .circular.label').text(block.child);
                    } else {
                        commentBlock.find('.viewMore.reply').remove();
                    }
                    tempHolder.append(commentBlock);
                });
                viewMore.parent().parent().parent().append(tempHolder);
                viewMore.remove();
                replyClick();
                viewMoreClick();
            });
        });
    };

    viewMoreClick();
</script>