require_relative 'Card.rb'

class Deck
    def initialize
        @cards = []
        suits = ['C', 'H', 'S', 'D']
        values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K']
        suits.each do |suit|
            values.each do |value|
                @cards.push Card.new(value, suit)
            end
        end
    end

    def getCardsRemaining
        @cards.length
    end

    def draw
        @cards.pop
    end

    def shuffle
        @cards.shuffle!
    end
end
