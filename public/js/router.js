AWWorld.Router = Backbone.Router.extend({
  routes: {
    '': 'home',
    'countries(/:value)(/:type)': 'showCountries'
  }
});
