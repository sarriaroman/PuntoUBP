<?php

        /**
         * Facebook-esque bottom bar
         *
         * @package bottom_bar
         * @author Jay Eames - Sitback
         * @link http://sitback.dyndns.org
         * @copyright (c) Jay Eames 2009
         * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
         */

	 
?>
    $("#bb_left_menu").hide();


    // Fix the stupid IE lack of support for indexOf
    if(!Array.indexOf){
      Array.prototype.indexOf = function(obj) {
	for(var i=0; i<this.length; i++){
	  if(this[i]==obj) return i;
	}
	return -1;
      }
    }

    // Create the function to see if the array key has already been created
    Array.prototype.keyExists = function(obj) {
      for (var k in this) {
	if (k == obj) return true;
      }
      return false;
    }
    
    var chatCount = 0;
    var bb_chat_windows = new Array();
    var bb_chat_cookie = new Array();

    var notifications;
    var timer;
    var easing;

    // To allow last messages
    var bb_chat_messages = new Array();
    var bb_chat_msg_pos = new Array();

    function removeTinyMCE(id) {
      try {
        tinyMCE.execCommand('mceRemoveControl', false, id);
      } catch(ex) {
 	var f = setTimeout('removeTinyMCE(' + id + ')', 5000);
      }
    }


    function addChat(chatboxtitle, chatwithname) {
      //$("#bb_chat:visible").slideToggle("normal");
      //if (typeof chatboxtitle == "undefined") {
  	//chatboxtitle = Math.floor(Math.random()*100);
      //}

      if ((bb_chat_windows.indexOf(chatboxtitle) == -1) && (typeof chatwithname != "undefined")) {
	var fix = chatCount == 0 ? 0 : 3;
        var dist = ((120*chatCount++) + 205 + fix);

        $(" <div />").attr("id","chatbox_button_"+chatboxtitle)
	  .addClass("bb_chat_list_button")
	  .html("<span style='color: white; cursor: pointer;' onClick='showBBChatDiv(\"chatbox_" + chatboxtitle + "\", true)'><img src='<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/icon_chat.gif' width=10> " + chatwithname + "</span>")
	  .appendTo($("#bb_bar"));
//	  .appendTo($( "body" ));

        $("#chatbox_button_"+chatboxtitle).css('bottom', '0px');
        $("#chatbox_button_"+chatboxtitle).css('right', dist + 'px');
        $("#chatbox_button_"+chatboxtitle).css('z-index', '10020');


        $(" <div />" ).attr("id","chatbox_"+chatboxtitle)
          .addClass("chatbox")
          .html('<div class="chatboxhead"><div class="chatboxtitle">' + chatwithname + '</div><div class="chatboxoptions"><a href="javascript:void(0)" onclick="javascript:bb_minimise(\''+chatboxtitle+'\')">-</a> <a href="javascript:void(0)" onclick="javascript:bb_close(\''+chatboxtitle+'\')">X</a></div><br clear="all"/></div><div class="chatboxcontent"></div><div class="chatboxinput"><textarea name="chat_' + chatboxtitle + '" class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,\''+chatboxtitle+'\');"></textarea></div>')
	  .appendTo($("#bb_bar"));

	$("#chatbox_" + chatboxtitle + " .chatboxcontent" ).append($.cookie(chatboxtitle + "_html"));
	$("#chatbox_" + chatboxtitle + " .chatboxcontent").scrollTop($("#chatbox_" + chatboxtitle + " .chatboxcontent")[0].scrollHeight);


	try {
	  $(document).ready(function (){
 	    setTimeout('removeTinyMCE("chat_' + chatboxtitle + '")', 500);
	  });
	} catch (e) {
	  alert(e);
	}

//          .appendTo($( "body" ));

        $("#chatbox_"+chatboxtitle).css('bottom', '25px');

        $("#chatbox_"+chatboxtitle).css('right', dist + 'px');

        $("#chatbox_"+chatboxtitle+" .chatboxtextarea").blur(function(){
                //chatboxFocus[chatboxtitle] = false;
                $("#chatbox_"+chatboxtitle+" .chatboxtextarea").removeClass('chatboxtextareaselected');
          }).focus(function(){
                //chatboxFocus[chatboxtitle] = true;
                //newMessages[chatboxtitle] = false;
                $('#chatbox_'+chatboxtitle+' .chatboxhead').removeClass('chatboxblink');
                $("#chatbox_"+chatboxtitle+" .chatboxtextarea").addClass('chatboxtextareaselected');
        });

        $("#chatbox_"+chatboxtitle).click(function() {
                if ($('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display') != 'none') {
                        $("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();
                }
        });

        $("#chatbox_"+chatboxtitle).show();
        $("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();

	if (bb_chat_windows.length > 0) {
	  for (var box in bb_chat_windows) {
	    $("#chatbox_" + bb_chat_windows[box] + ":visible").hide();
	  }
	}

	bb_chat_windows.push(chatboxtitle);
	bb_chat_cookie.push(chatboxtitle + "|" + chatwithname + "|visible");
	//$.cookie("bb_chat_cookie", bb_chat_cookie.join(","), { path: "/"});
	updateCookie();

	// Start checking for messages
	timer = setTimeout(checkMessages, 500);
	easing = 500;
	easecount = 0;

	if (!bb_chat_messages.keyExists(chatboxtitle)) {
	  bb_chat_messages.push(chatboxtitle);
	  bb_chat_messages[chatboxtitle] = new Array();
    	  bb_chat_msg_pos.push(chatboxtitle);

	  if ($.cookie(chatboxtitle) != null) {
	    bb_chat_messages[chatboxtitle] = $.cookie(chatboxtitle).split("|~|");
	    bb_chat_msg_pos[chatboxtitle] = bb_chat_messages[chatboxtitle].length;
	  }
	}

      } else {
        if (typeof chatwithname != "undefined") {
	  showBBChatDiv("chatbox_" + chatboxtitle);
	}
      }
    }

    var easecount = 0;

    function checkMessages() {
	var newMessage = false;
	$.get("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/chat.php?action=rx", function(data) {
            if (data != "") {
	      try {
  	        newMessage = true;
	        msg = data.split("|",3);
	        // See if the window is open already, and if not, add it ...
	        if (bb_chat_windows.indexOf(msg[0]) == -1) {
	  	  addChat(msg[0], msg[1]);
 	        }
	      
	        // Update the div with the message
	        var message = bbParseText(msg[2].replace(/^\s+|\s+$/g,"").replace(/\n/g,'<br />'));

	        if (message.substring(0,3)=="/me") {
		  message = message.substring(3).replace(/^\s+|\s+$/g,"");

		  if (message.substring(0,1)=="'")
                    $("#chatbox_" + msg[0] + " .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">' + msg[1] + '</span><span class="chatboxmessagecontent">' + message + '</span></div>');
		  else
                    $("#chatbox_" + msg[0] + " .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">' + msg[1] + '&nbsp;</span><span class="chatboxmessagecontent">' + message + '</span></div>');
	        } else {
                  $("#chatbox_" + msg[0] + " .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">' + msg[1] + ':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
	        }
                $("#chatbox_" + msg[0] +" .chatboxcontent").scrollTop($("#chatbox_" + msg[0] + " .chatboxcontent")[0].scrollHeight);

	        // Now flash the notification bar and play a sound if needed

       	        if (!$("#chatbox_" + msg[0]).is(':visible')) {
		  $("#chatbox_button_" + msg[0]).css('background','#ff0000');
	        }

                $.sound.play("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/sounds/chat.mp3");

	        // $.cookie(msg[0] + "_html", $("#chatbox_" + msg[0] + " .chatboxcontent").html(), { path: "/"});
	        updateChatHistoryCookie(msg[0]);


	        easing = 500;
	        easecount = 0;

//            } else {
//	      alert("no messages");
	      } catch (ex) {

	      }
	    }
        });
	
	if (easing < 10000 && newMessage == false && easecount++ > 30) {
	  easing = (easing * 1.5) > 10000 ? 10000 : (easing * 1.5);
	}
	timer = setTimeout(checkMessages, easing);
    }

    function updateChatHistoryCookie(id) {
 	var last = $("#chatbox_" + id + " .chatboxcontent").html();
	if (last.length > 4096) {
	   while (last.length > 2048 && last.indexOf("</div>")!=-1) {
	     last = last.substring(last.indexOf("</div>")+6);
	   }
	}
	$.cookie(id + "_html", last, { path: "/" });
    }

    function checkChatBoxInputKey(event,chatboxtextarea,chatboxtitle) {
	if(event.keyCode == 38 && bb_chat_messages.length >= 0) {
	  var pos = bb_chat_msg_pos[chatboxtitle]==0 ? 0 : --bb_chat_msg_pos[chatboxtitle];
	  $(chatboxtextarea).val(bb_chat_messages[chatboxtitle][pos]);
          return false;
	}

	if(event.keyCode == 40 && bb_chat_messages.length != 0) {
	  var pos = bb_chat_msg_pos[chatboxtitle]==bb_chat_messages[chatboxtitle].length ? bb_chat_messages[chatboxtitle].length : ++bb_chat_msg_pos[chatboxtitle];

	  if (pos >= bb_chat_messages[chatboxtitle].length) {
	    $(chatboxtextarea).val("");
	  } else {
	    $(chatboxtextarea).val(bb_chat_messages[chatboxtitle][pos]);
	  }

          return false;
	}


        if(event.keyCode == 13 && event.shiftKey == 0)  {

                message = $(chatboxtextarea).val();
		origmsg = message.replace(/^\s+|\s+$/g,"");
                message = bbParseText(message.replace(/^\s+|\s+$/g,"").replace(/\n/g,'<br />'));

                $(chatboxtextarea).css('height','44px');
                //$(chatboxtextarea).val("");
		chatboxtextarea.value = "";
                $(chatboxtextarea).focus();
                if (message != '') {
                  $.get("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/chat.php?action=tx", {from: '<?php echo $_SESSION['user']->guid; ?>' ,to: chatboxtitle, message: origmsg} , function(data, status){
		     if (message.substring(0,3)=="/me") {
			message = message.substring(3).replace(/^\s+|\s+$/g,"");
			if (message.substring(0,1)=="'")
                     	  $("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom"><?php echo $_SESSION['user']->name; ?></span><span class="chatboxmessagecontent">' + message + '</span></div>');
			else
                     	  $("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom"><?php echo $_SESSION['user']->name; ?>&nbsp;</span><span class="chatboxmessagecontent">' + message + '</span></div>');
		     } else {
                     	$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom"><?php echo $_SESSION['user']->name; ?>:&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
		     }
                     $("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
		     bb_chat_messages[chatboxtitle].push(origmsg);
		     bb_chat_msg_pos[chatboxtitle] = bb_chat_messages[chatboxtitle].length;

		     $.cookie(chatboxtitle,bb_chat_messages[chatboxtitle].join("|~|"), { path: "/"});
		     // $.cookie(chatboxtitle + "_html", $("#chatbox_" + chatboxtitle + " .chatboxcontent").html(), { path: "/"});
		     updateChatHistoryCookie(chatboxtitle);
                  });
                }
		
                return false;
        }

        var adjustedHeight = chatboxtextarea.clientHeight;
        var maxHeight = 94;

        if (maxHeight > adjustedHeight) {
                adjustedHeight = Math.max(chatboxtextarea.scrollHeight, adjustedHeight);
                if (maxHeight)
                        adjustedHeight = Math.min(maxHeight, adjustedHeight);
                if (adjustedHeight > chatboxtextarea.clientHeight)
                        $(chatboxtextarea).css('height',adjustedHeight+8 +'px');
        } else {
                $(chatboxtextarea).css('overflow','auto');
        }

    }
  
    function showBBChatDiv(div) {
      for (var check = 0; check < bb_chat_windows.length; check++)
      {
        var test = "chatbox_" + bb_chat_windows[check];
        var name = $("#" + test + " .chatboxtitle").html();
        if (name != null) {
          if (div != test) {
            $("#" + test + ":visible").hide();
            bb_chat_cookie[check] = bb_chat_windows[check] + "|" + name + "|hidden";
          } else {
            $("#chatbox_button_" + bb_chat_windows[check]).css('background','none');
            bb_chat_cookie[check] = bb_chat_windows[check] + "|" + name + "|visible";
          }
        }
      }
      //$.cookie("bb_chat_cookie", bb_chat_cookie.join(","), { path: "/"});
      updateCookie();
      $("#" + div).show();
      $("#" + div + " .chatboxtextarea").focus();
    }

    function bb_minimise(id) {
      $("#chatbox_" + id + ":visible").hide();
      for (var check in bb_chat_windows) {
	var test = "chatbox_" + bb_chat_windows[check];
	var name = $("#" + test + " .chatboxtitle").html();
	if (name != null) {
	  if (id == bb_chat_windows[check]) {
	    bb_chat_cookie[check] = bb_chat_windows[check] + "|" + name + "|hidden";
	  }
	}
      }
      //$.cookie("bb_chat_cookie", bb_chat_cookie.join(","), { path: "/"});
      updateCookie();
    }

    function bb_close(id) {
      // On closing a window, work out how many are above it and shuffle their positions down
      try {
        $("#chatbox_" + id).remove();
        $("#chatbox_button_" + id).remove();
        if (bb_chat_windows.length > 1) {
  	  var sort = false;
  	  var splice;
          for (var box = 0; box < bb_chat_windows.length; box++) {
 	    if (sort) {
	      var div = bb_chat_windows[box];
 	      var r = parseInt(($("#chatbox_" + div).css('right')).slice(0,-2))-150;
	      $("#chatbox_" + div).css('right', r + 'px');
	      $("#chatbox_button_" + div).css('right', r + 'px');
	    }
	    if (bb_chat_windows[box] == id) { 
	      sort = true; 
	      splice = box;
	    }
	  }
	  bb_chat_windows.splice(splice,1);
	  bb_chat_cookie.splice(splice,1);
        } else {
	  bb_chat_windows = new Array();
	  bb_chat_cookie = new Array();
          updateCookie();
        }
        chatCount--;
      }
      catch (err) {
	//alert(err.message);
      }
    }

    function showMine() {
      var mf = document.getElementById("bb_hidden_river_mine").innerHTML;
      document.getElementById("bb_notification_main").innerHTML = mf;
      document.getElementById("showAll").style.background = "none";
      document.getElementById("showMine").style.background = "#ffffff";
    }

    function showAll() {
      var mf = document.getElementById("bb_hidden_river_all").innerHTML;
      document.getElementById("bb_notification_main").innerHTML = mf;
      document.getElementById("showAll").style.background = "#ffffff";
      document.getElementById("showMine").style.background = "none";
    }

    var button_normal_background = document.getElementById("bb_newposts_button").style.background;

    function initPage() {
      easing = 500;
      timer = setTimeout(checkMessages, easing);
      notifications = setTimeout(checkNotifications,<?php echo ($refreshRate+10000); ?>);
      initWindows();
    }

    function initWindows() {
      bbwin = new Array();
      try {
        if ($.cookie("bb_chat_cookie")!= null) {
          var bbwinc = $.cookie("bb_chat_cookie");
	  if (bbwinc.indexOf(",") != -1) {
	    bbwin = bbwinc.split(",");
          } else {
	    bbwin.push(bbwinc);
	  }
          if (bbwin.length > 0) {
            for (var i=0; i < bbwin.length; i++) {
	      reloadWindows(bbwin[i]);
            }
          }
        }
      } 
      catch(err) {
	//alert(err.message);
      }
    }

    function updateCookie() {
      try {
        if (bb_chat_cookie.length > 0) {
	  $.cookie("bb_chat_cookie", bb_chat_cookie.join(","), { path: "/"});
        } else {
	  $.cookie("bb_chat_cookie", "", { path: "/"});
        }
      }
      catch (err) {
	//alert(err.message);
      }
    }

    function reloadWindows(hash) {
	var wins = hash.split("|");
	if (wins.length == 3) {
	  addChat(wins[0],wins[1]);
	  if (wins[2]=="hidden") bb_minimise(wins[0]);
	}
    }

    function bbIconClick() {
	$.sound.play("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/sounds/chat.mp3");
    }

    function checkNotifications()
    {
      $.get("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/status.php", function(data) {
	if (data == 1) {
	  // Track if we have played a notification sound
	  var notified = false;

          $.get("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/update.php?type=mine", function(data) {
  	    if (data != "") {
	       document.getElementById("bb_newposts_button").style.background="#ff0000";
	       $("#bb_hidden_river_mine").html = data;
	       document.getElementById("bb_notification_main").innerHTML = data;
               document.getElementById("showMine").style.background = "#ffffff";
               document.getElementById("showAll").style.background = "none";
	       if (!notified) { 
		 $.sound.play("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/sounds/notify.mp3");
		 notified = true;
	       }
	    }
          });

          $.get("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/update.php?type=all", function(data) {
	    if (data != "") {
	       document.getElementById("bb_newposts_button").style.background="#ff0000";
	       $("#bb_hidden_river_all").html = data;
	       document.getElementById("bb_notification_main").innerHTML = data;
	       document.getElementById("showAll").style.background = "#ffffff";
               document.getElementById("showMine").style.background = "none";
	       if (!notified) { 
		 $.sound.play("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/sounds/notify.mp3");
		 notified = true;
	       }
	    }
          });

  	  <?php if ($chatEnabled) { ?>
          $.get("<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/friends.php", function(data) {
	      var split = data.split("|");
	      document.getElementById("bb_friends_main").innerHTML = split[0];
	      document.getElementById("bb_friends_count").innerHTML = split[1];
          });
	  <?php } ?>
          setTimeout(checkNotifications, <?php echo $refreshRate; ?>);
        } else {
  	  document.getElementById("bb_friends_main").innerHTML = "You have been logged off";
	  document.getElementById("bb_notification_main").innerHTML = "You have been logged off";
	  document.getElementById("bb_friendslist_button").innerHTML = "<b style='color: red;'>Logged Off</b>";
	  <?php 
	    if (get_plugin_setting("force_login", "bottom_bar") == "true") 
	      echo "document.location = '" . $CONFIG->wwwroot . "';"; 
	  ?>
        }
      });
    }

    // Smiley replacement code! ;)

    var smiley_array = [":)",":D","8)",":P",":P",":o",":O",":(",":'(",";)",":lol:",":mad:",":heartbeat:",":love:",":eprop:",":wave:",":sunny:",":wha:",":yes:",":sleepy:",":rolleyes:",":lookaround:",":eek:",":confused_2:",":nono:",":fun:",":goodjob:",":giggle:",":cry:",":shysmile:",":jealous:",":whocares:",":spinning:",":coolman:",":littlekiss:",":laugh:"];
    var smiley_xhtml = ['ss.png','d.png','mafia.png','p.png','p.png','oh.png','oh.png','sad.png','cry.png','zmik.png',"Smileylol.gif","7_mad.gif","heartbeating.gif","SmileLove.gif","eProp.gif","SmileyWave.gif","sunnySmiley.gif","wha.gif","yes.gif","Smileysleep.gif","Smileyrolleyes.gif","SmileyLookaround.gif","Smileyeek.gif","Smileyconfused.gif","SmileyAnimatedNoNo.gif","propeller.gif","goodjob.gif","emot-giggle.gif","blueAnimatedCry.gif","Animatedshysmile.gif","AliceJealous.gif","19_indifferent.gif","Smileyspinning.gif","25_coolguy.gif","AliceSmileyAnimatedBlinkKiss.gif","LaughingAgua.gif"];
 
    function bbParseText(text)
    {
      // Check for any html code and disable
      ind = text.indexOf("<");
      while (ind != -1) {
	text = text.replace('<','&#60;');
	ind = text.indexOf("<");
      }

      ind = text.indexOf(">");
      while (ind != -1) {
	text = text.replace('>','&#62;');
	ind = text.indexOf(">");
      }


      // Parse url's and code them

      text = text.replace(/((https?\:\/\/|ftp\:\/\/)|(www\.))(\S+)(\w{2,4})(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/gi,function(url){
        nice = url;
        if( url.match('^https?:\/\/') ) {
	  nice = nice.replace(/^https?:\/\//i,'')
        } else {
	  url = 'http://'+url;
        }
	if ( url.indexOf('<?php echo substr($CONFIG->wwwroot,7); ?>') != -1)
          return '<a rel="nofollow" href="'+ url +'">'+ nice +'</a>';
	else
          return '<a target="_blank" rel="nofollow" href="'+ url +'">'+ nice +'</a>';
      });
      

      // Parse for underline and bold
      var b_open = false;

      ind = text.indexOf("*");
      while (ind != -1) {
	if (b_open) {
	  text = text.replace('*','</b>');
	} else {
	  text = text.replace('*','<b>');
	}
	b_open = !b_open;
	ind = text.indexOf("*");
      }
      if (b_open) text += "</b>";


      // Finally parse smiliey
      for (var i in smiley_array) {
        var smiley_img = '<img alt="" src="<?php echo $CONFIG->wwwroot; ?>mod/bottom_bar/graphics/icons/smilies/' + smiley_xhtml[i] + '" />';
  	var intIndexOfMatch = text.indexOf(smiley_array[i]);
	if (intIndexOfMatch != -1) {
  	  while (intIndexOfMatch != -1) {
   	    text = text.replace(smiley_array[i],smiley_img);
   	    intIndexOfMatch = text.indexOf(smiley_array[i]);
          }
        }
      }

      return text;
    }


    (function($) {	
      $.sound = {
	tracks: {},
	enabled: true,
	template: function(src) {
		return '<embed style="height:0" loop="false" src="' + src + '" autostart="true" hidden="true"/>';
	},
	play: function(url, options){
		if (!this.enabled)
			return;
		var settings = $.extend({
			url: url,
			timeout: 2000
		}, options);
		
		if (settings.track) {
			if (this.tracks[settings.track]) {
				var current = this.tracks[settings.track];
				// TODO check when Stop is avaiable, certainly not on a jQuery object
				current.Stop && current.Stop();
				current.remove();  
			}
		}
		
		var element = $.browser.msie
		  	? $('<bgsound/>').attr({
		        src: settings.url,
				loop: 1,
				autostart: true
		      })
		  	: $(this.template(settings.url));
			
		element.appendTo("body");
		
		if (settings.track) {
			this.tracks[settings.track] = element;
		}

	        try {		
		  setTimeout(function() {
			element.remove();
		  }, options.timeout)
	        } catch(err) {}
		
		return element;
	}
      };

    })(jQuery);


    $.sound.enabled = <?php echo ($soundEnabled ? "true" : "false") ; ?>;



