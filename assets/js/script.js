  // 2. Este codigo carga el codigo del reproductor de forma asincronica.
  var tag = document.createElement('script');//Generamos un script

  tag.src = "https://www.youtube.com/iframe_api";//El script se vinculara hacia la pagina descripta(API)
  var firstScriptTag = document.getElementsByTagName('script')[0];//Accedemos a la posicion cero del script que devolvera 
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  
  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
 
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      height:'360',
      width: '100%',
      videoId: 'Ycs7gq_fRcA',
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      },
      playerVars: {rel: 0}
      
      
    });
  }

  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    var titulo=player.getVideoData().title;
    titulo=(titulo[0]).toUpperCase()+titulo.substring(1);
    
    event.target.playVideo();
    document.getElementById("titulo").innerHTML="<center><h3 class=\"text-secondary \">"+titulo+"</center></h3>";
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
     //setTimeout(stopVideo, 6000);
      done = true;
      
    }
  }
  function stopVideo() {
    player.stopVideo();
  }

