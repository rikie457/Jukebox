/**
 * Created by Menno on 17/05/2017.
 */
console.log("page loaded");

function ajaxRequest(file, returnTarget, request, request2, request3) {
    $.post(file,
        {
            request: request,
            request2: request2,
            request3: request3
        },
        function (data, status) {
            $(".result").children().remove();
            $(".result").css("width", "auto");
            $(".result").css("padding", "5px");
            $(".result").css("box-shadow", " 0px 0px 10px black");
            $(".result").append("<p>" + data + "</p>");
            console.log("ajax request status: " + status);
            console.log("return: " + data);
            function hideMessage() {
                $(".result").css("width", "0");
                $(".result").css("padding", "0");
                $(".result").css("box-shadow", "none");
                clearInterval(interval);
                console.log("hiding");
            }

            var interval = setInterval(function () {
                hideMessage()
            }, 2000);
        })
}
function showPlaylist(origin) {
    $(origin).removeClass('fa fa-2x fa-plus');
    $(origin).addClass('fa fa-2x fa-minus');
    $(origin).attr('onclick', 'hidePlaylist(this);');
    $(origin).parent("div").children("#playlists").show(100);
}
function hidePlaylist(origin) {
    $(origin).removeClass('fa fa-2x fa-minus');
    $(origin).addClass('fa fa-2x fa-plus');
    $(origin).attr('onclick', 'showPlaylist(this);');
    $(origin).parent("div").children("#playlists").hide(100);
}
function addToPlaylist(pid, sid) {
    ajaxRequest('playlistHandler.php', false, pid, sid, '');
}
function newPlaylist() {
    $(".newPlaylist").html("<input id='newPlaylistName' type='text' style='width:90px' name='playlistName' />   <div style='display: inline; width: auto' onclick='createNewPlaylist()'><i style='text-align: center;' class='fa fa-plus'></i></div>");
    $("#newPlaylistName").focus();
}
function createNewPlaylist() {
    $.post("newPlaylist.php",
        {
            playlistname: $('#newPlaylistName').val()
        },
        function (data, status) {
            $(".playlistframe").children().remove();
            $(".playlist-frame").html(data);
            console.log("ajax request status: " + status);
            console.log("ajax request return: " + data);
        }
    )
}
function getNextSong(embed, dur) {
    function send(embed, i) {
        $.post("getNextSong.php",
            {
                songEmbed: embed
            },
            function (data, status) {
                console.log("ajax request status: " + status);
                $(".video-frame").html(data);
                console.log("ajax request return: " + data);
            }
        );
        setTimeout(send(embed[i + 1]), dur * 1000);
    }

    if (embed.isArray) {
        for (var i = 0; i < embed.length; i++) {
            send(embed[i], i);
        }
    } else {
        $.post("getNextSong.php",
            {
                songEmbed: embed
            },
            function (data, status) {
                console.log("ajax request status: " + status);
                $(".video-frame").html(data);
                console.log("ajax request return: " + data);
            }
        )
    }
}
function PlaylistRequest(playlist_id) {
    $.post("getPlaylistSongs.php",
        {
            playlist_id: playlist_id
        },
        function (data, status) {
            $(".playlist-item-frame").css("border", "solid 1px black");
            $(".playlist-item-frame").html(data);
            $(".playlist-item-frame").append('<div class="video-frame"></div>');
            console.log("ajax request status: " + status);
        }
    )
}
