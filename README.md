# Bar Chart
####[EducationSuperHighway] Coding Challenge
A web application which displays a bar chart of the average cost per megabit of bandwidth for each organization in the sample set provided.

## Requirements
- The horizontal X axis should show BEN, which is the Billed Entity Number of the organization, a unique number provided in the sample set
- The vertical Y axis should show average (mean) cost per megabit. In other words, taking bandwidth and purchase price, first convert the bandwidth value into megabits and then use the formula cost_per_megabit = purchase_price / bandwidth_in_mb
 Average these values over the sample set to find the average cost per megabit.
- Some of the data is in MongoDB. Some of the data is in a SQL format. For the SQL data you will have to write the schema for the database engine of your choice based on the INSERTs provided. The data is not in the same format in each database, but the bar chart should show data from both sources.
- To start, install mongodb and the SQL engine of your choice and use seed.js and seed.sql, respectively, to populate the databases
- Additionally, write at least one test case, testing either the model, controller, view, or all three. Choose the test that is most valuable, depending on how you've chosen to write the code.

The objective of this exercise is to create a bar chart from sql file and js file (to be loaded to MongoDB)

### Tech
* PHP
* MySQL
* MongoDB
* [JpGraph]

### Installation
* Ensure MySQL and MongoDB are running smoothly.
* Place your MySQL credentials and endpoint on line 7 in model.php
* Download [JpGraph] and place the folder alongside the BarChart folder so that they both have the same parent folder. Basically, you want it to be one directory level above view.php 
* Place this folder in server location from where it can accessed by the browser. (Normally htdocs or shtdocs). 
* Run db/setup.php either from command line or browser to setup data. 

 > NOTE: Care should be taken while running this script. If your MySQL has eshdb and/or MongoDB has organiztions collection in test db, they will be altered by running setup.php  

* Run index.php from browser to view bar graph.

### Assumptions
    All records for a particular school are only in one database. i.e. they are not shared between MySQL and MongoDB.

![alt text][Screenshot]

License
----
MIT


**Free Software, Hell Yeah!**

[EducationSuperHighway]:http://www.educationsuperhighway.org/
[JpGraph]:http://jpgraph.net/
[Screenshot]: https://github.com/shreyansz/BarChart/blob/master/BarChart.png
