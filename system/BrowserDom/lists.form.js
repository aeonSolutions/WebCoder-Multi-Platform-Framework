// Dynamic Select Library
// (c) 2009-2011 Xul.fr
// GNU GPL 3 License


// Ajax funtion to load a file.

function dataRead(url, fun)
{ 
	var xhr = createXHR();
	xhr.onreadystatechange=function()
	{ 
		if(xhr.readyState == 4)
		{
			if(xhr.status == 200)
			{
				fun(xhr.responseText);
			}
		} 
	}; 

	url = url + "?nocache=" + Math.random();
	xhr.open("GET", url , true);
	xhr.send(null); 
} 

// Event activated when an option is selected. Not used here.

function selectoption()
{
	var selected = document.dynsel.select1.selectedIndex;
	var title = document.dynsel.select1[selected].text;
	// not used for now
}

// Add a new option to the list

function addoption()
{
	var optlist = document.getElementById("select1");
	var title = document.dynsel.title.value;
	var size = optlist.options.length;
	
	for(i = 0; i < size; i++)  // this is required for IE
	{
		if(optlist.options[i] == null || optlist.options[i].text == "")
		{
			optlist.options[i] = new Option(title);
			return;
		}
	}
	optlist.options[size] = new Option(title);

}

// Creating the options in select from loaded file

function populate(content)
{
	content = content.replace(" ", "");
	var lst = content.split("<br>");
	var optlist = document.getElementById("select1");
	for(i = 0; i < lst.length; i++)
	{
		if(lst[i] == "") continue;
		optlist.options[i] = new Option(lst[i]);
	}
}

// Load the data and populate the select

function initialize()
{
	dataRead("dynamic-select.txt", populate);
}


// Delete an entry

function deloption()
{
	var optlist = document.getElementById("select1");
	var selected = optlist.selectedIndex;
	var last = optlist.options.length - 1;

	for(i = selected; i < last; i++)
	{
		optlist.options[i] = new Option(optlist.options[i + 1].text);
	}

	optlist.options[last] = null;

}

// Moving up an option
// The text is just exchanged with the previous one in the list

function moveup()
{
	var optlist = document.getElementById("select1");
	var i = optlist.selectedIndex;

	if(i == 0) return; // can't move

	var title = optlist.options[i-1].text;
	optlist.options[i-1].text = optlist.options[i].text;
	optlist.options[i].text = title;
	optlist.selectedIndex = i - 1;

}


function loadapage(element, res)
{
	// action is unchanged, but if you choose dynamically the page to load, assign it here
	//element.form.action = "";
	element.form.submit()
}

// Write to the server

function dataWrite(url, data, fun, element)
{ 
	var xhr = createXHR();

	xhr.onreadystatechange=function()
	{ 
		if(xhr.readyState == 4)
		{
			if(fun != null) fun(element, xhr.responseText);
		}
	}; 
	xhr.open("POST",url, true);		
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(data); 
} 


// Saving the list of options

function savelist(element)
{
	var title = "";
	var url = "";
	var data = "";

	var optlist = document.getElementById("select1");
	var size = optlist.options.length;

	for(i = 0; i < size; i++)
	{
		title = optlist.options[i].text;
		if(title == "") continue;

			
		if(data != "") data +="&";
		data += "tab" + String(i) + "=" + title;
	}    	 
	
	dataWrite("dynamic-save.php", data, loadapage, element);
 		
}
	
// Starts the job by populating the SELECT with a list of options	

window.onload=initialize;
