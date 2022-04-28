function searchAndDisplay(){
	findBat();
	if(foundBat >= 0){
		displayBat();
	}
	return false;
}

/*
A problem with the function below
is that it only finds one bat.
Sometimes more than one bat
will match the user's requirements.

What if a user does not care about
the gender of the bat? 
These possibilities have not
been catered for.
*/

function findBat(){
	let batForm = document.getElementById("batForm"); //the main form
	let gender = batForm.gender.value; //the value of the gender element
	let minCost = parseInt(batForm.min_Cost.value); //the value of the min cost element converted to an integer 
	let maxPrice = parseInt(batForm.max_Cost.value);//the value of the max cost element converted to an integer 
	
	//loop through the bates finding any that max
	//why is the loop only finding one bat?
	for(i = 0 ; i < batName.length; i++){
		if(batGender[i] == gender){
			if(BatPrice[i] >= minCost  && BatPrice[i] <= maxPrice )
			foundBat = i++
		}
	}
}

/*
This simply alerts the user
It would be better to use standard DOM
such as createElement and createAttribute
to create figure and figcaption tags in 
the HTML on-the-fly
*/
function displayBat(){
	alert("You need: " + batName[foundBat]);
}

/*
this variable represents the index of the found bat
-1 means no bat found as arrays start at zero
*/

let foundBat = -1; // a bad use of a global variable

/*
This uses parallel arrays. 
It would be better to use objects
*/

batName = ["Boom Slasher 2000 - Cost: £129.99", "RazorBack - Cost: £99.99", "AS - Cost: £89.99", "Plain Puma - Cost: £69.99 - Cheapest", "GM - Cost: £199.99", "Adidas - Cost: £169.99"];

BatPrice = [129.99, 99.99, 89.99, 69.99, 199.99, 169.99];

batGender = ["Male", "Male", "Female", "Female", "Male", "Female"];

//the pictures are currently here as a reference
//they have not been used
//batPic = []

/*
Could we place this in a function 
that is called when 
the HTML doc is loaded?
*/
let btn;
btn = document.getElementById("find_Btn");

btn.addEventListener("click", searchAndDisplay); 




//###*** ALERT PROMPT BAT FINDER CODE ***###//
// let foundBat = -1; // - 1 means we have not found a bat

// //parallel array of the bates 
// batName = ["Boom Slasher 2000", "RazorBack", "AS", "Plain Puma", "GM", "Adidas"];

// batCost = [129.99, 99.99, 89.99, 69.99, 199.99, 169.99];

// batGender = ["Male", "Male", "Female", "Female", "Male", "Female"];

// //the pictures are currently here as a reference
// //they have not been used
// //batImg = []



// let gender = prompt("What is your Gender: "); 

// let minCost = prompt("What is the Minimum Cost of the Bat: "); 

// let maxCost = prompt("What is the Maximum Cost of the Bat: ");


// //loop through the bates finding any that max
// //why is the loop only finding one bat?
// for(i = 0 ; i < batName.length; i++){
	// if(batGender[i] == gender){
		// if(batCost[i] >= minCost  && batCost[i] <= maxCost )
		// foundBat = i // assign the array index to foundBat
	// }
// }


// if(foundBat >= 0){
	// alert("You need: " + batName[foundBat]);
// }








