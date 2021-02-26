$(document).ready(function(){
    $(".auto-complete-blog").autocomplete({
          source: blogURL,
          select: function(event, ui) {   
              if(ui.item.type == "blog")
              {
                window.location.href="/blog/" + ui.item.reference;
              }
              else if(ui.item.type == "news")
              {
                window.location.href="/news/" + ui.item.reference;
              }
          }
    })
    .autocomplete("instance")._renderItem = function (ul, item) {
              var newText = String(item.value).replace(
                      new RegExp(this.term, "gi"),
                      "<span class='ui-state-highlight'>$&</span>");

              return $("<li></li>")
                      .data("ui-autocomplete-item", item)
                      .append("<div>" + newText + "</div>")
                      .appendTo(ul);
          };
 });