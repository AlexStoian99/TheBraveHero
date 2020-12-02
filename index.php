<?php

class Character {

    public $life ;
    public $power;
    public $defense;
    public $speed;
    public $luck;

    public function dragonPower()
    {
        $this->power *= 2;
    }

    /**
     * Character constructor.
     * @param $life
     * @param $power
     * @param $defense
     * @param $speed
     * @param $luck
     */
    public function __construct($life, $power, $defense, $speed, $luck)
    {
        $this->life = $life;
        $this->power = $power;
        $this->defense = $defense;
        $this->speed = $speed;
        $this->luck = $luck;
    }

    /**
     * @return mixed
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param mixed $life
     */
    public function setLife($life)
    {
        $this->life = $life;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;
    }

}

function carlStartFirst($carl, $opponent) {

    echo "First Attack Carl \n";

    $chanceDragonPower = 5;

    echo "Carl Power before double:" . $carl->getPower() . "\n";

    if ($chanceDragonPower > 0 && $chanceDragonPower <= 10)
        $carl->dragonPower();

    echo "Carl Power after double: " . $carl->getPower() . "\n";


    for ($i = 1; $i <= 20; $i++) {

        //--- Carl ---------------------------------------------------------------------------------------------

        $opponentLifeBeforeDamage = $opponent->getLife();
        $damageCarl = $carl->getPower() - $opponent->getDefense();

        $opponentLife = $opponent->getLife() - $damageCarl;

        $opponent->setLife($opponentLife);

        echo "Round : " . $i .
            " Opponent Life Before Damage : " . $opponentLifeBeforeDamage .
            " Carl damage : " . $damageCarl .
            " Opponent Life After Damage : " . ($opponentLife <= 0 ? 0 : $opponentLife) .
            "\n";

        if ($opponent->getLife() <= 0) {

            $opponent->setLife(0);

            echo 'WIN CARL';

            break;
        }

        //--- Opponent ---------------------------------------------------------------------------------------------

        $carlLifeBeforeDamage = $carl->getLife();
        $damageOpponent = $opponent->getPower() - $carl->getDefense();

        $carlLife = $carl->getLife() - $damageOpponent;

        $carl->setLife($carlLife);

        echo "Round : " . $i .
            " Carl Life Before Damage : " . $carlLifeBeforeDamage .
            " Carl damage : " . $damageOpponent .
            " Carl Life After Damage : " . ($carlLife <= 0 ? 0 : $carlLife) .
            "\n";

        if ($carl->getLife() <= 0) {

            $carl->setLife(0);

            echo 'WIN OPPONENT';

            break;
        }

        echo "\n";
    }
}

function opponentStartFirst($carl, $opponent) {

    echo "First Attack Opponent \n";

    for ($i = 1; $i <= 20 ; $i++) {

        //--- Opponent ---------------------------------------------------------------------------------------------

        $carlLifeBeforeDamage = $carl->getLife();
        $damageOpponent = $opponent->getPower() - $carl->getDefense();

        $carlLife = $carl->getLife() - $damageOpponent;

        $carl->setLife($carlLife);

        echo "Round : " . $i .
            " Carl Life Before Damage : " . $carlLifeBeforeDamage .
            " Carl damage : " . $damageOpponent .
            " Carl Life After Damage : " . ($carlLife <= 0 ? 0 : $carlLife) .
            "\n";

        if ($carl->getLife() <= 0) {

            $carl->setLife(0);

            echo 'WIN OPPONENT';

            break;
        }

        //--- Carl ---------------------------------------------------------------------------------------------

        $opponentLifeBeforeDamage = $opponent->getLife();
        $damageCarl = $carl->getPower() - $opponent->getDefense();

        $opponentLife = $opponent->getLife() - $damageCarl;

        $opponent->setLife($opponentLife);

        echo "Round : " . $i .
            " Opponent Life Before Damage : " . $opponentLifeBeforeDamage .
            " Carl damage : " . $damageCarl .
            " Opponent Life After Damage : " . ($opponentLife <= 0 ? 0 : $opponentLife) .
            "\n";

        if ($opponent->getLife() <= 0) {

            $opponent->setLife(0);

            echo 'WIN CARL';

            break;
        }

        echo "\n";
    }
}

$carl = new Character(
    rand(65,95),
    rand(60,70),
    rand(40,50),
    rand(40,50),
    rand(10,30)/100
);


$opponent = new Character(
    rand(55,80),
    rand(50,80),
    rand(35,55),
    rand(40,60),
    rand(25,40)/100
);

if( $carl->getSpeed() > $opponent->getSpeed() ) {

    carlStartFirst($carl, $opponent);

} elseif ($carl->getSpeed() < $opponent->getSpeed()) {

    opponentStartFirst($carl, $opponent);

} else {

    echo "Depending Luck \n";

    if($carl->getLuck() > $opponent->getLuck()) carlStartFirst($carl, $opponent);
    else opponentStartFirst($carl, $opponent);

}