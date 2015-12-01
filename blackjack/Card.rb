class Card
    def initialize value, suit
        @value = value
        @suit = suit
    end

    def toString
        "[#{@value} #{@suit}]"
    end

    def getBlackjackValue
        if  @value.to_i != 0
            return @value.to_i
        elsif @value == 'A'
            return 11
        else
            return 10
        end
    end

end
