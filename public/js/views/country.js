AWWorld.Views.Country = Backbone.View.extend({
  tagName: 'tr',
  className: '',
  template: _.template($('#tpl-country').html()),

  render: function() {
    var html = this.template(this.model.toJSON());
    this.$el.append(html);
    return this;
  }
});
