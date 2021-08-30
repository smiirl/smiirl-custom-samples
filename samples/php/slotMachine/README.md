
This example use the Smiirl Custom Counter as a random generator for a "Lotto game":

## Rules ##
First Choose 
- the number of players, 
- the size X (number of digits) of your counter, 
- the range of the digits.
- the names of players

Then each player chooses a bet on X digits (on the fixed range).

Launch the game turn with the "Roll the dice" button: 
the counter shows the number drawn.

Use the button "Reveal Result" to show won points:

- Each misplaced digit earns 10 points.
- Each well placed number earns 100 points.
- Each well placed number (in addition to a first one) multiplies the score of the round by 2.




## Install
- ```
  composer install
  ```
- Make shure that `roll.php` is executable.
- Use `index.html` to show the interface.
- In https://my.smiirl.com:
    - Go to the `Settings` of your counter.
    - Change its options to `"PUSH NUMBER"`. 
    - Get the `API Parameters` of your counter 
    and fill the `Counter Id` and `Counter Token` fields of the interface.  

- Invite friends and launch a game.
 
