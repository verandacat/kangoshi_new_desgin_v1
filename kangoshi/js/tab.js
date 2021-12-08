var tabBtn = $(".tab-button");
var tabCtt = $(".tab-content");

$("#tab__list").click(function(e) {
    $(e.target).each(function() {
      if($(this).prop("tagName") !== "LI") {
        return;
      } else {
        open(e.target.dataset.id);
      }
    })
    
});

function open(i) {
  tabBtn.removeClass('active');
  tabCtt.removeClass('show');
  tabBtn.eq(i).addClass('active');
  tabCtt.eq(i).addClass('show');
}