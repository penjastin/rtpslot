$(document).ready(function () {
  //getRandomInt();
  replaceColor();
  jamRtp();
  replaceMark();

  function getRandomInt() {
    
      $.ajax({
        type: "GET",
        url: "apps/random",
        async: false,
        dataType: "json",
        success: function (data) {

          let a = data;      
          
          $.each(a, function (i, data) {           

              let aI = data.id_json;
              let b = data.rtp_random;
              let c = data.polartp;
              let percentTxt = $("#percent-txt-" + i);
              let polaTxt = $(".lpola-" + i);
              let xPola = "<span class=''>Pola tidak tersedia!<br/>Silahkan gunakan pola anda pribadi.<span>";

              percentTxt.html(b + "%");

              if (b < 30) {
                polaTxt.html(xPola);
              } else {
                polaTxt.html(c);
              }

              $("#percent-bar-" + i)
                .attr("aria-valuenow", b)
              .css("width", b + "%");

          });            
        }
      });
  }

  function replaceMark() {
    
    $(".fitur-no").each(function () {
      // $(this).addClass("fa-xmark text-danger").removeClass("fa-check text-success");
      $(this).html("<span class=''>Game ini tidak tersedia pola.<br/>Semoga beruntung!<span>").remove;
    });
    
  }

  function replaceColor() {
      
        $(".percent-bar").each(function () {
          const p = $(this).parents("div").find(">p").text().replace("%", "") | 0;
          let cls = "green";
          if (p < 30) {
            cls = "red";
          } else if (p < 70) {
            cls = "yellow";
          }
          $(this).removeClass("red green yellow").addClass(cls);      
        });
  }
  
  function jamRtp() {

    const zeroPad = (num, places) => String(num).padStart(places, '0');

    for (let i = 0; i < 500; i++) {

      j = document.querySelectorAll("img[data-pos]")[i];

      const d = new Date();
      var date = d.getUTCDate(),
        day = d.getUTCDay() + 1,
        year = d.getUTCFullYear(),
        month = d.getUTCMonth() + 1,
        hour = d.getUTCHours(),
        mon = d.getMinutes(),
        min = d.getMinutes();
      min = (min < 30) ? 1 : 2;
      if (typeof j !== 'undefined') {
        var xx = day + year * month * date;
        var target = (xx % 10);
        var hour2 = (hour + 7) % 24;
        xx = Math.pow(xx, hour * min);
        xx = xx * i;
        var randomTarget = zeroPad((hour2 + target) % 24, 2);
        var min1 = zeroPad(xx % 60, 2);
        var min2 = zeroPad((xx * date) % 60, 2);
        hour2 = zeroPad(hour2, 2);

        var jamR = hour2 + ":" + min1 + " - " + randomTarget + ":" + min2;

        $("#prov1-info-jam-" + i).html(jamR);
        $("#prov1-info-jam-148").html(jamR);
        $("#prov1-info-jam-254").html(jamR);
        $("#prov1-info-jam-76").html(jamR);
        $("#prov1-info-jam-324").html(jamR);
        $("#prov1-info-jam-129").html(jamR);
        $("#prov1-info-jam-199").html(jamR);
      }
    }
  }  
  
});

$(document).ready(function($) {

  $('.listSearch li').each(function() {
    $(this).attr('searchData', $(this).text().toLowerCase());
  });
  $('.boxSearch').on('keyup', function() {
    var dataList = $(this).val().toLowerCase();
    $('.listSearch li').each(function() {
      if ($(this).filter('[searchData *= ' + dataList + ']').length > 0 || dataList.length < 1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

});

function gameSearch(data) {
  var filter, listGames, a, i;
  filter = data.value.toUpperCase();

  //console.log(filter);
  listGames = document.getElementsByClassName('game-one-half-slot slots-games');

  for (i = 0; i < listGames.length; i++) {
    a = listGames[i].getElementsByTagName("b")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      listGames[i].style.display = "";
    } else {
      listGames[i].style.display = "none";
    }
  }
}


