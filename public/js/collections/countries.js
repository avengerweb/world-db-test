AWWorld.Collections.Countries = Backbone.Collection.extend({
  url: "/api/countries",
  model: AWWorld.Models.Country,
  sortTypes: {
    continentType :"asc",
    regionType  :"asc",
    countryCountType :"asc",
    lifeType :"asc",
    populationType :"asc",
    cityCountType :"asc",
    languagesCountType  :"asc"
  }
});
