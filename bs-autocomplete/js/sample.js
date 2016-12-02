$(function() {
  return $('.ta').typeahead({
    name: 'names',
    prefetch: '/bs-autocomplete/sample.json',
    //local: ["斉藤", "斉木", "大野", "大原"],
    limit: 10
  });
});

