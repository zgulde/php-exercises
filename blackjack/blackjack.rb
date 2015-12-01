require_relative 'Deck.rb'

def getHandTotal hand
  total = 0
	hand.each do |card|
		total += card.getBlackjackValue
	end
	return total
end

def echoHand hand, name, hidden=false

	total = getHandTotal hand
	firstCard = hand.shift

	print "#{name}:"

	if hidden
		total = '??'
		print ' [???] '
	else
		print " #{firstCard.toString} "
	end

	hand.each do |card| 
		sleep 0.3
		print " #{card.toString} "
	end
			
	sleep 0.3
	puts "  Total: #{total}"

	hand.unshift firstCard

	sleep 1
end

userAction = ''
dealerHand = []
playerHand = []
deck = Deck.new

deck.shuffle

dealerHand.push deck.draw, deck.draw
playerHand.push deck.draw, deck.draw

echoHand dealerHand, 'Dealer', true
echoHand playerHand, 'Player'

while userAction.downcase != 's' do
	break if getHandTotal(playerHand) > 21

	puts "Cards Remaining: #{deck.getCardsRemaining}"
	print '(H)it or (S)tay > '
	userAction = gets.chomp
	
	break if userAction.downcase == 's'
	playerHand.push deck.draw
	echoHand playerHand, 'Player'
end

if getHandTotal(playerHand) > 21
	puts "Bust!!!"
	exit
elsif getHandTotal(playerHand) == 21
	puts "Blackjack!!!"
	exit
end

echoHand dealerHand, 'Dealer'
echoHand playerHand, 'Player'

while getHandTotal(dealerHand) < 17 or getHandTotal(dealerHand) < getHandTotal(playerHand) do
	puts 'Dealer Hits...'
	dealerHand.push deck.draw
	echoHand dealerHand, 'Dealer'
end

if getHandTotal(dealerHand) > 21
	puts 'Dealer Busts!!! You Win'
elsif getHandTotal(dealerHand) < getHandTotal(playerHand)
	puts 'You Win!!!'
else
	puts 'You Lose'
end
