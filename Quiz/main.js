$( document ).ready(function() {
    var base_color = "rgb(230,230,230)";
    var active_color = "rgb(243, 83, 74)";
    
    
    
    var child = 1;
    // $("#submit").addClass("disabled");
    var length = $("section").length - 1;
    // alert(length)
    $("#prev").addClass("disabled");
    $("#submit").addClass("disabled");
    
    $("section").not("section:nth-of-type(1)").hide();
    $("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');
    
    var svgWidth = length * 200 + 24;
    $("#svg_wrap").html(
      '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
        svgWidth +
        ' 24" xml:space="preserve"></svg>'
    );
    
    function makeSVG(tag, attrs) {
      var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
      for (var k in attrs) el.setAttribute(k, attrs[k]);
      return el;
    }
    
    for (i = 0; i < length; i++) {
      var positionX = 12 + i * 200;
      var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
      document.getElementById("svg_form_time").appendChild(rect);
      // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
      var circle = makeSVG("circle", {
        cx: positionX,
        cy: 12,
        r: 12,
        width: positionX,
        height: 6
      });
      document.getElementById("svg_form_time").appendChild(circle);
    }
    
    var circle = makeSVG("circle", {
      cx: positionX + 200,
      cy: 12,
      r: 12,
      width: positionX,
      height: 6
    });
    document.getElementById("svg_form_time").appendChild(circle);
    
    $('#svg_form_time rect').css('fill',base_color);
    $('#svg_form_time circle').css('fill',base_color);
    $("circle:nth-of-type(1)").css("fill", active_color);
    
     
    $(".button").click(function () {
      // var current_index = $(this).parent().index("section");
			// if(validateStep(current_index)){

    


      var id = $(this).attr("id");
      if (id == "next") {
        // alert('name');

      var current_index = $(this).parent().index("section");
      // var name = $("#option").attr("name");
 
			if(validateStep(current_index)){

        $("#svg_form_time rect").css("fill", active_color);
        $("#svg_form_time circle").css("fill", active_color);

        
        
        if (child >= length+1) {
          $(this).addClass("disabled");
          $("#next").addClass("disabled");
          $("#submit").removeClass("disabled");
          // alert(length);
        }
        if (child <= length) {
          child++;
        }
      }
      } else if (id == "prev") {
        $("#next").removeClass("disabled");
        $('#submit').addClass("disabled");
        if (child <= 2) {
          $(this).addClass("disabled");
        }
        if (child > 1) {
          child--;
        }
      }
      var circle_child = child + 1;
      $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
        "fill",
        base_color
      );
      $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
        "fill",
        base_color
      );
      var currentSection = $("section:nth-of-type(" + child + ")");
      currentSection.fadeIn();
      currentSection.css('transform','translateX(0)');
     currentSection.prevAll('section').css('transform','translateX(-100px)');
      currentSection.nextAll('section').css('transform','translateX(100px)');
      $('section').not(currentSection).hide();
    // }
    });


    	
		function validateStep(step){
      // alert($("input[name='q1']:checked").length);
      // alert(step);
			switch(step){
				case 0:
					if(($("input[name='q1']:checked").length === 0)){
						alert('Please select an option');
						return false;
          }
					return true;
				break;
				case 1:
					if(($("input[name='q2']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 2:
					if(($("input[name='q3']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 3:
					if(($("input[name='q4']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 4:
					if(($("input[name='q5']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 5:
					if(($("input[name='q6']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 6:
					if(($("input[name='q7']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 7:
					if(($("input[name='q8']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 8:
					if(($("input[name='q9']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
        break;
        case 9:
					if(($("input[name='q10']:checked").length === 0)){
						alert('Please select an option');
						return false;
					}
					return true;
				break;
				default:
			}
		}
    });

    