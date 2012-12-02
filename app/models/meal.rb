class Meal < ActiveRecord::Base
  attr_accessible :consumptionlevel, :date, :timing, :meal_type_id
end
