
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;

function onYouTubePlayerAPIReady()
{
    player = new YT.Player(seyevObj.selector, {
        height: seyevObj.height,
        width: seyevObj.height,
        events: {
            'onReady': seyevObj.callback
        }
    });
}

function onPlayerReadyByVideoId(event)
{
    event.target.loadVideoById({
        videoId: seyevObj.id,
        startSeconds: parseInt(seyevObj.start_from),
        suggestedQuality: seyevObj.quality
    });
}

function onPlayerReadyByVideoIds(event)
{
    event.target.loadPlaylist(
            seyevObj.ids,
            (parseInt(seyevObj.start_after) - 1),
            parseInt(seyevObj.start_from),
            seyevObj.quality
            );
    playerVolume(event);
}

function onPlayerReadyByList(event)
{
    var obj = {
        listType: seyevObj.listType,
        list: seyevObj.playlist,
        index: (parseInt(seyevObj.start_after) - 1),
        suggestedQuality: seyevObj.quality
    };

    if (seyevObj.start_from !== undefined) {
        obj.startSeconds = parseInt(seyevObj.start_from);
    }
    event.target.loadPlaylist(obj);
    playerVolume(event);
}

function onPlayerReadyByUserUploadList(event)
{
    var obj = {
        listType: 'user_uploads',
        list: seyevObj.user_uploads,
        index: (parseInt(seyevObj.start_after) - 1),
        suggestedQuality: seyevObj.quality
    };

    if (seyevObj.start_from !== undefined) {
        obj.startSeconds = parseInt(seyevObj.start_from);
    }

    event.target.loadPlaylist(obj);
    playerVolume(event);
}

function playerVolume(e) {

    if (seyevObj.hasOwnProperty('volume')) {
        e.target.setVolume(parseInt(seyevObj.volume));
        return;
    }

    e.target.mute();
}
