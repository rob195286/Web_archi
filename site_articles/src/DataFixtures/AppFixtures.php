<?php
namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Film;
use App\Entity\Critic;
use App\Entity\Critique;
use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        $type = array("horror", "scifi", "comedy", "action", "romance","thriller", "fantastic", "other", "psychologic");
        // --------------------------------------- BOOK
        $bookArray = array();
        for($i = 1; $i <= 30; $i++){
            $book = new Book();
            $book->setAuthor("aut$i")
                 ->setCitizenship($countries[rand(0, count($countries)-1)])
                 ->setCover(file_get_contents('http://loripsum.net/api'))
                 ->setImage("lien$i")
                 ->setPrice($i+rand(0,100))
                 ->setReleaseDate(new \DateTime())
                 ->setTitle("Title$i")
                 ->setType($type[rand(0, count($type)-1)]);
            $manager->persist($book);
            $bookArray[$i] = $book;
        }
        // --------------------------------------- Film
        $filmArray = array();
        for($i = 1; $i <= 40; $i++){
            $film = new Film();
            $film->setAuthor("aut$i")
                 ->setCitizenship($countries[rand(0, count($countries)-1)])
                 ->setImage("lien$i")
                 ->setPrice($i+rand(0,25))
                 ->setReleaseDate(new \DateTime())
                 ->setSynopsis(file_get_contents('http://loripsum.net/api'))
                 ->setTitle("Title$i")
                 ->setType($type[rand(0, count($type)-1)]);
            $manager->persist($film);
            $filmArray[$i] = $film;
        }
        // --------------------------------------- Critic
        $criticArray = array();
        for($i = 1; $i <=50; $i++){
            $critic = new Critic();
            $critic->setPseudo("pseudo$i");
            $manager->persist($critic);
            $criticArray[$i] = $critic;
        }
        // --------------------------------------- Critique
        for($i = 1; $i <= 200; $i++){
            $book = $bookArray[rand(1,29)];
            $film = $filmArray[rand(1,29)];
            $critic = $criticArray[rand(1,49)];
            $critique = new Critique();
            $critique->setBook($book)
                     ->setFilm($film)
                     ->setCritic($critic)
                     ->setCritique(file_get_contents('http://loripsum.net/api'));
            $manager->persist($critique);
        }
        // --------------------------------------- Note
        for($i = 1; $i <= 500; $i++){
            $book = $bookArray[rand(1,29)];
            $film = $filmArray[rand(1,29)];
            $critic = $criticArray[rand(1,49)];
            $note = new Note();
            $note->setBook($book)
                 ->setFilm($film)
                 ->setCritic($critic)
                 ->setValue(rand(0, 5));
            $manager->persist($note);
        }
        $manager->flush();
    }
}