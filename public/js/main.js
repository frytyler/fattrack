(function () {

	window.App = {
		Models: {},
		Views: {},
		Collections: {}
	};

	window.template = function (id) {
		return _.template($('#' + id).html());
	};

	App.Models.Meal = Backbone.Model.extend({
		initialize: function(){},  
		defaults: {
			type_id: '',
			eaten_at: new Date(),
			consumption_level: 0,
			timing: 0
		}  
	});

	App.Models.MealItem = Backbone.Model.extend({
		initialize: function(){},  
		defaults: {
			meal_id: 0,
			description: '',
			health_level: 0
		}
	});

	App.Collections.MealItems = Backbone.Collection.extend({
		model : App.Models.MealItem,
		}
	});

	App.Views.MealItems = Backbone.View.extend({
		tagName : "ul",
		className: "mealitems",
		initialize: function () {
			this.collection.on('add', this.addOne, this);
		},
		render: function () {
			this.collection.each(this.addOne, this);
			return this;
		},
		addOne: function(task) {
			var mealitemsView = new App.Views.MealItem({model: task});
			this.$el.append(mealitemsView.render().el);
		}
	});

	App.Views.MealItem = Backbone.View.extend({
		tagName : "li",
		className: "mealitem",
		template: template('mealItemTemplate'),
		initialize: function () {
			this.model.on('change', this.render, this);
			this.model.on('destroy', this.remove, this);
		},
		events: {
			'click .delete': 'destroy'
		},
		destroy: function () {
			this.model.destroy();
		},
		remove: function () {
			this.$el.remove();
			console.log(tasks);
		},
		render: function () {
			var template = this.template(this.model.toJSON());
			this.$el.html(template);
			return this;
		}
	});

	window.mealitemsCollection = new App.Collections.MealItems([
		{
			description: 'Avacodos',
			health_level: 1
		},
		{
			title: 'Shreddies',
			health_level: 0
		},
		{
			title: 'McNuggets',
			health_level: -1
		}
	]);

	var mealitemsView = new App.Views.MealItems({collection: mealitemsCollection});

	$('#content.grid_4').append(mealitemsView.render().el);

})();