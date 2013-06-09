$(document).foundation();


var quotatotale = 1;
var eventdata = [];
var feedindex = 10;

function loadfeeds()
{

    feedindex = feedindex + 10;

    $.ajax({
        type: "GET",
        dataType: "json",
        beforeSend: function(x) {
            if(x && x.overrideMimeType) {
                x.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        url: 'http://meytip.com/back/meytip/web/feeds/'+feedindex+'.json',
        success: function(result) {

            item = '';
            for(var i = 0; i < result.length; i++){
                var data = '<div class=\"feed\">';
                data = data +'<div class=\"row\"><div class=\"large-12 columns\">';
                data = data +'<div class=\"foto\"><img src=\"https://graph.facebook.com/'+result[i].fbid+'/picture?type=square\" width=\"30\" height=\"30\"></div>';
                data = data +'<div class=\"testo\"><h11><span class=\"blu\"><a>'+result[i].createdAt+' '+result[i].name+'</a></span> ha effettuato questa scommessa </h11></div></div></div>';
                data = data +'<table style=\"width:100%\">';
                data = data +'<thead><tr><th><h6>INNOVACTION LAB FINAL EVENT</h6></th><th><h6> Finale SI</h6></th>';
                data = data +'<th><h6> Finale NO</h6></th><th><h6> 1</h6></th><th><h6>X</h6></th><th><h6>2</h6></th>';
                data = data +'</tr></thead><tbody>';
                for(var j = 0; j < result[i].quote.length; j++){

                    data = data +'<tr event=\"'+result[i].quote[j].quote.team.id+'\"eventname=\"'+result[i].quote[j].quote.team.name+'\">';
                    data = data +'<td><span data-tooltip class=\"tip-right\" title=\"'+result[i].quote[j].quote.team.tagline+'</p>';
                    data = data + result[i].quote[j].quote.team.teewtidea +'\"><a href=\"#\" >'+result[i].quote[j].quote.team.name+'</a></span></td>';

                    if(result[i].quote[j].prono == 'finale sì'){
                        data = data +'<td><a href=\"#\" class=\"tiny success button event\" value=\"'+result[i].quote[j].quote.final+'\" bet=\"finale sì\" betid=\"222\" bettype=\"finale sì/no" >';
                        data = data +result[i].quote[j].quote.final+'</a></td>';
                    }
                    else{
                        data = data +'<td><a href=\"#\" class=\"tiny button event\" value=\"'+result[i].quote[j].quote.final+'\" bet=\"finale sì\" betid=\"222\" bettype=\"finale sì/no" >';
                        data = data +result[i].quote[j].quote.final+'</a></td>';
                    }
                    if(result[i].quote[j].prono == 'finale no'){

                        data = data + '<td><a href=\"#\"';
                        data = data + 'class=\"tiny success button event\" value=\"'+result[i].quote[j].nofinal+'\" bet=\"finale no\" betid=\"223\" bettype=\"finale sì/no\" >'+result[i].quote[j].quote.nofinal+'</a></td>';
                    }
                    else{
                        data = data + '<td><a href=\"#\"';
                        data = data + 'class=\"tiny button event\" value=\"'+result[i].quote[j].nofinal+'\" bet=\"finale no\" betid=\"223\" bettype=\"finale sì/no\" >'+result[i].quote[j].quote.nofinal+'</a></td>';
                    }

                    data = data + '<td><a href=\"#\" class=\"tiny button disabled\">ND</a></td>';
                    data = data +' <td><a href=\"#\" class=\"tiny button disabled\">ND</a></td>';
                    data = data +  '<td><a href="#" class="tiny button disabled">ND</a></td>';
                    data = data +'</tr>';
                }

                data = data + ' </tbody> </table></div><div>';
                item = item + data;

            }

            $showmore = document.getElementById('show');
            $(item).fadeIn('slow').insertBefore($showmore);
                //appendTo('#contentfeed');

        }
    });

}
$('#stake').keyup(function () {
    var s =  document.getElementById("stake").value;
    document.getElementById('potenziale').innerHTML = (s*quotatotale).toFixed(2);

    });
$("#contentfeed").delegate(".event", "click", function(e) {
    var quota = $(this).attr('value');
    var bet = $(this).attr('bet');
    var betid = $(this).attr('betid');
    var bettype = $(this).attr('bettype');
    var eventid = $(this).parents('tr').attr('event');
    var eventname = $(this).parents('tr').attr('eventname')

    if($.inArray(eventid, eventdata) == -1)
    {
        eventdata.push(eventid);
        appendBet(eventid,eventname,bettype,bet,betid,quota);


    }else{
         alert('evento già inserito');
    }
    e.preventDefault();
});
$("#betevent").delegate(".event", "click", function(e) {
    var quota = $(this).attr('value');
    var bet = $(this).attr('bet');
    var betid = $(this).attr('betid');
    var bettype = $(this).attr('bettype');
    var eventid = $(this).parents('tr').attr('event');
    var eventname = $(this).parents('tr').attr('eventname')

    if($.inArray(eventid, eventdata) == -1)
    {
        eventdata.push(eventid);
        appendBet(eventid,eventname,bettype,bet,betid,quota);


    }else{


        alert('evento già inserito');
    }
    e.preventDefault();
});
/*$(".event").on("click", function (e) {


});*/

/**
* Build a entry in right side column ( the column of the pending bet )
* @param eventid l'id dell'evento
* @param eventname il nome dell'evento e.g Lazio - Juve
* @param bettype Il tipo di scommessa e.g Finale sì/finale no
* @param bet Cosa ha scommesso e.g finale sì
* @param betid L'id di cosa ha scommesso
* @param quota la quota scommessa
*/
function appendBet(eventid, eventname, bettype,bet,betid,quota){


    var li = '<li class=\"giocata\" eventid="'+eventid+'"eventname="'+eventname+'" bettype="'+bettype+'" bet="'+bet+'" betid="'+betid+'" quota="'+quota+'">';
    li = li+'<div class="row collpase clearfix">';
    li = li + '<div class="large-1 columns">';
    li = li + '<form class="custom">';
    li = li + '<label for="checkbox1">';
    li = li + '<input type="checkbox" id="checkbox1" style="display: none;">';
    li = li + '<span class="custom checkbox checked" style="float:left; margin-right:10px"></span>';
    li = li + '</label>';
    li = li + '</form>';
    li = li + '</div>';
    li = li + '<div class="large-10 columns">';
    li = li + '<h6>'+eventname+'</h6>';
    li = li + '<h10>'+bettype+'</h10>';
    li = li + '<h10 class="black">'+bet+' - '+quota+'</h10>';
    li = li + '</div>';
    li = li + '<div>';
    li = li + '<a class="tiny button btnschedina">SFIDA</a>';
    li = li + '</div>';
    li = li + '</div>';
    li = li + '</li>';
    $(li).fadeIn('slow').appendTo('#curbet');
    quotatotale = quota * quotatotale;
    document.getElementById("quotatotale").innerHTML = quotatotale.toFixed(2);
    }

function Sched () {
    this.moltiplicatore;
    this.amount;
    this.bets = new Array();
    this.user = null;
    };
function Bet () {
    this.prono;
    this.odds;
    this.eventid;
    this.eventname;
    this.finaleisi;
    this.finaleno;


    };

function bet(user){



    var ul = document.getElementById("curbet");
    var items = ul.getElementsByTagName("li");

    var importo = parseInt(document.getElementById("stake").value);
    var cash = parseInt(document.getElementById("cash").innerHTML);

    if(importo == '' || importo == null || isNaN(importo))
    {
        alert('Hai inserito un importo nullo');
        return;
    }
    if(importo <= 0){

         alert('Hai inserito un importo non valido');
        return;
    }
    if(importo > cash)
        {
            alert('Non ha abbastanza crediti per completare la scommessa');
            return;
            }
        else
        {

            var sched = new Sched();
            sched.user = user;
            sched.amount = importo;
            sched.moltiplicatore = quotatotale;
            if(items.length <= 1)
            {
            alert('Non hai selezionato nessuna scommessa');
            return;
            }

        for (var i = 0; i < items.length; ++i) {


        if(items[i].getAttribute('quota') != null){
        var bets = new Bet();
        bets.prono = items[i].getAttribute('bet');
        bets.odds = items[i].getAttribute('quota');
        bets.eventid = items[i].getAttribute('eventid');

        sched.bets.push(bets);
        //alert(items[i].getAttribute('quota')+' '+items[i].getAttribute('eventname'));
        }

    }
    var data = JSON.stringify(sched);

    alert(data);
    $.ajax({
        type: "POST",
        dataType: "json",

        data: data,
        beforeSend: function(x) {
        if(x && x.overrideMimeType) {
        x.overrideMimeType("application/json;charset=UTF-8");
        }
    },
    url: 'http://www.meytip.com/back/meytip/web/bet',
    success: function(data) {
        // 'data' is a JSON object which we can access directly.
        // Evaluate the data.success member and do something appropriate...

        pending = data.user.pending;
        cash = data.user.cash;
        document.getElementById("pending").innerHTML = pending;
        document.getElementById("cash").innerHTML = cash;
        //clear old bet
        ul.innerHTML = '<li class=\"title\"><h9>Le tue scommesse</h9></li>';
        //set to q quota
        quotatotale = 1;
        eventdata = [];
        document.getElementById("stake").value = '';
        document.getElementById("quotatotale").innerHTML = '';
        document.getElementById("potenziale").innerHTML = '';

        //open modal
        $('#myModal').foundation('reveal', 'open');
        //postWall();
        }
    });


    }//close else

    }

    function postWall()
    {
        var body = 'Place a bet in TotoInnLab event';
        FB.api('/me/feed', 'post', { message: body }, function(response) {
        if (!response || response.error) {
        alert('Error occured');
        } else {
        alert('Post ID: ' + response.id);
        }
    });
    }
