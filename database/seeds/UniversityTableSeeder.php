<?php

use Illuminate\Database\Seeder;
use App\Models\University;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$univList = array (	"Arizona State University",
                        	"Auburn University",
							"Baylor College of Medicine",
							"Boston College",
							"Boston University",
							"Brandeis University",
							"Brigham Young University",
							"California Institute of Technology",
							"Carnegie Mellon University",
							"Case Western Reserve University",
							"City University of New York City College",
							"Clemson University",
							"Colorado State University",
							"Columbia University",
							"Cornell University",
							"Dartmouth College",
							"Drexel University",
							"Duke University",
							"Emory University",
							"Florida State University",
							"George Mason University",
							"Georgetown University",
							"Georgia Institute of Technology",
							"Harvard University",
							"Indiana University Bloomington",
							"Indiana University-Purdue University",
							"Iowa State University",
							"Kansas State University",
							"Kent State University",
							"Lehigh University",
							"Lousiana State University - Baton Rouge",
							"Massachusetts Institute of Technology",
							"Mayo Medical School",
							"Medical College of Wisconsin",
							"Medical University of South Carolina",
							"Michigan State University",
							"Mount Sinai School of Medicine",
							"New York University",
							"North Carolina State University",
							"Northeastern University",
							"Northwestern University",
							"Oregon Health and Science University",
							"Oregon State University",
							"Pennsylvania State University - University Park",
							"Portland State University",
							"Princeton University",
							"Purdue University - West Lafayette",
							"Rensselaer Polytechnic Institute",
							"Rice University",
							"Rockefeller University",
							"Rutgers, The State University of New Jersey - New Brunswick",
							"Saint Louis University",
							"San Diego State University",
							"Southern Methodist University",
							"Stanford University",
							"State University of New York Health Science Center",
							"State University of New York at Albany",
							"State University of New York at Buffalo",
							"State University of New York at Stony Brook",
							"Syracuse University",
							"Temple University",
							"Texas A&M University - College Station",
							"Texas Tech University",
							"The George Washington University",
							"The Johns Hopkins University",
							"The Ohio State University - Columbus",
							"The University of Alabama at Birmingham",
							"The University of Connecticut - Storrs",
							"The University of Georgia",
							"The University of Montana - Missoula",
							"The University of New Mexico - Albuquerque",
							"The University of Texas Health Science Center Houston",
							"The University of Texas Health Science Center San Antonio",
							"The University of Texas M. D. Anderson Cancer Center",
							"The University of Texas Medical Branch at Galveston",
							"The University of Texas Southwestern Medical Center",
							"The University of Texas at Austin",
							"The University of Texas at Dallas",
							"Thomas Jefferson University",
							"Tufts University",
							"Tulane University",
							"University of Alaska - Fairbanks",
							"University of Arizona",
							"University of California, Berkeley",
							"University of California, Davis",
							"University of California, Irvine",
							"University of California, Los Angeles",
							"University of California, Riverside",
							"University of California, San Diego",
							"University of California, San Francisco",
							"University of California, Santa Barbara",
							"University of California, Santa Cruz",
							"University of Central Florida",
							"University of Chicago",
							"University of Cincinnati",
							"University of Colorado at Boulder",
							"University of Colorado at Denver",
							"University of Delaware",
							"University of Florida",
							"University of Hawaii at Manoa",
							"University of Houston",
							"University of Idaho",
							"University of Illinois at Chicago",
							"University of Illinois at Urbana-Champaign",
							"University of Iowa",
							"University of Kansas - Lawrence",
							"University of Kentucky",
							"University of Maryland, Baltimore",
							"University of Maryland, Baltomore County",
							"University of Maryland, College Park",
							"University of Massachusetts Amherst",
							"University of Massachusetts Medical School, Worcester",
							"University of Medicine and Dentistry, New Jersey",
							"University of Miami",
							"University of Michigan - Ann Arbor",
							"University of Minnesota, Twin Cities",
							"University of Missouri - Columbia",
							"University of Nebraska - Lincoln",
							"University of Nebraska Medical Center",
							"University of New Hampshire - Durham",
							"University of North Carolina at Chapel Hill",
							"University of Notre Dame",
							"University of Oklahoma - Norman",
							"University of Oregon",
							"University of Pennsylvania",
							"University of Pittsburgh",
							"University of Rhode Island",
							"University of Rochester",
							"University of South Carolina - Columbia",
							"University of South Florida",
							"University of Southern California",
							"University of Tennessee - Knoxville",
							"University of Utah",
							"University of Vermont",
							"University of Virginia",
							"University of Washington",
							"University of Wisconsin - Madison",
							"University of Wyoming",
							"Utah State University",
							"Vanderbilt University",
							"Virginia Commonwealth University",
							"Virginia Polytechnic Institute and State University",
							"Wake Forest University",
							"Washington State University",
							"Washington University in St. Louis",
							"Wayne State University",
							"Yale University",
							"Yeshiva University"
					);

        $faker = Faker\Factory::create();
        
//        University::truncate();

        University::create([
			'id'		   => 0,
            'name'         => "Choose University...", 
            'city'         => "NULL",
        ]);

        foreach ($univList as $university)
        {
            University::create([
                'name'         => $university, 
                'city'         => $faker->city,
            ]);
        }
    
    }
}
