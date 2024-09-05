window.addEventListener('load', function() {
    'use strict';
	
	/*PURPOSE: output a maximum of 25 rows at time. Every 25 rows, output in a different "slide"*/
	
	//retrieve each row of the table (books list)
	
	const l_list = document.getElementsByTagName("tr");
	const l_tbody = document.getElementsByTagName("tbody");
	const l_content = document.getElementsByClassName("books")[0];
	
	//number of the rows
	const l_length = l_list.length;

	/*create a variable to count the links needed and the id to assign to the rows*/
	let count = 0;
	/*create an array of links*/
	let link = [];
	
	let ul = document.createElement("ul");

	
	/*how many links are necessary*/
	for(let i=0; i<l_length;i++ ){
        if((i%25)== 0){
			link[count] = document.createElement("a");
			link[count].href = "#top";
			link[count].innerHTML = (count+1);
			let li = document.createElement("li");
			ul.appendChild(li);
			li.appendChild(link[count]);
			count++;
		}
	l_content.appendChild(ul);
	/*show the first 25 rows as default*/
		if(i>24){
			l_list[i].style.display = "none";
		}
	}
	link[0].classList.add("current");
	/*create an onclick event: when the user click on one of the numeric link, the related rows are displayed. Moreover, the class current will be added on the link
	selected*/
	
	for(let i=0; i<count; i++){
		link[i].onclick = function(e){
			for(let r=1; r<l_length; r++){
					if(r<((i+1)*24)&& r>(i*25))
					l_list[r].style.display = "";
					else
					l_list[r].style.display = "none";
			}
			link[i].classList.toggle("current");
			for(let other=0; other<count;other++){
				if(link[other]!=link[i])
					link[other].classList.remove("current");
			}
			
		};
	}//end management of displaying table

});