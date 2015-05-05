var Cameron = Cameron || {};

Cameron.pages = {

  main: function() {
    var form = $('form');
    form.submit(function(){
      form.find('input.required').each(function(){
        var input = this;
        Cameron.forms.fieldIsEmpty(this);
      });
    });
  }

}
