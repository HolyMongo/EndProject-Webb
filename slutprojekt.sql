-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 07 maj 2023 kl 21:17
-- Serverversion: 10.4.22-MariaDB
-- PHP-version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `slutprojekt`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `modules`
--

CREATE TABLE `modules` (
  `moduleID` int(11) NOT NULL,
  `ModuleNumber` float NOT NULL,
  `ModuleName` varchar(40) NOT NULL,
  `DisplayName` varchar(40) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `modules`
--

INSERT INTO `modules` (`moduleID`, `ModuleNumber`, `ModuleName`, `DisplayName`, `content`) VALUES
(1, 1, 'Basics', 'Unity Basics', '<h2> Unity Basics </h2>\r\n<br>\r\n\r\n<p>In this assignment we will go over the basics of Unityand how to use the software. We will look at the basics from how to move the camera and how to create objects to costumizing the UI and putting components on objects.</p>\r\n\r\n<br>\r\n\r\n<p>If you already have unity installed you can skip ahead to the next assignment. If you don\'t have it installed, don\'t worry. We will cover everything you need to know in order to get unity correctly installed on you computer. The first step is to head over to Unity\'s own webbsite. Head over to https://unity.com/download och click \r\n<a href=\"https://unity.com/download\" target=\"_blank\">here</a>. Once there, click the big blue button that says \"Download for windows\". If you however are using a mac och a linux operating system, scroll down a bit and you will see three links. Click on the one that has you operating system in it.\r\n</p>\r\n\r\n<img src=\"Pictures/downloadUnity.png\" class=\"img-fluid mx-auto border\" alt=\"\">\r\n<br><br>\r\n<p>Once you click your respective link a download will start for a file calle something along the lines of \"UnityHubSetup.exe\". Once it is finished, open the file and accept the terms of service, choose where you want to save unity hub and hit install. Unity Hub should now start installing on you computer (Side note: you might need to allow access to Unity hub). The program we just downloaded, Unity hub, will be the application you use to create and view all of your projects and download different versions of the Unity editor. </p>\r\n\r\n<br>\r\n\r\n<p>Once the download is finished open the application and you should be greeted by this (Except you won\'t have any projects):</p>\r\n\r\n<img src=\"Pictures/UnityHub.png\" class=\"img-fluid mx-auto border\" alt=\"\">\r\n<br><br>\r\n\r\n<p>The next step is to download a version of the unity editor. To do this look for the \"installs\" button on the left and click it. Then locate the blue button on the top right that says \"Install Editor\" and click it. Once you click it you will be greetet with a window with multiple releases. Click \"Install\" on the release under the LTS or Long Term Support that has a little text beneath it that says \"Recommended version\". You will now be granted with a screen that displays different modules and addons. For now, do not worry about them as many of them are used for building a game for muliple platforms. If you however want to use alphabets other than the latin one (the alphabet used in english) you can add them near the bottom of the list. Just check the box to the left of the alphabet you want. When you are done with this, click teh \"Instal\" button in the bottom right corner. When the Editor is done istalling, Unity hub will install Visual Studios which will be the program we code and edit our scripts in. Once the download for both Unity Editor and Visual Studio is done you are ready to start creating a project. This will be done in the next assignment so click the button down below to mark it as done and move on to the next assignment to keep on learning!</p>\r\n\r\n<br>\r\n<button type=\"button\" class=\"btn btn-outline-success DoneButton float-right\">Mark As Done</button>'),
(2, 2, 'CodingBasics', 'Coding Basics', '<h2>Coding</h2>\r\n<br>\r\n<p>To get things to happend in your scene you use code. In this assignment we will go over the basics and fundamentals of coding in unity.</p>\r\n<br>\r\n<p>Unity uses a coding language called C#(pronounced C-sharp). It is in this language that you will write all the logic behind your games. C# is an object-oriented laguage which means that it relies on objectx. But what does that mean? Lets take a look at the example below.\r\n</p>\r\n\r\n<img src=\"Pictures/debugLog.png\" class=\"img-fluid mx-auto border\" alt=\"\">\r\n<br>\r\n<br>\r\n<p> In this example we pring out the word Test in the console. If we look a bit closer we see that the function Log is located in the object Debug. By doing it this way we as programmers dont need to think about how the object Debug och Log is programmed as long as we know what it does. Doing it this way also helps us look for bugs. Instead of searching through hundred or thousand lines of code, we can istead look at different objects to see where the code crashed. In this example, if we know that Debug.Log() works but not other functions in the Debug object we know that the Debug object has nothing wrong and that the problem lies in the other function.\r\n</p>\r\n\r\n<p> This was just a quick overview of C# but in the following lessions we will learn about syntax (kinda like grammar but in coding) and how to code. Once you are ready to statr with that, mark this assignment as done and move on to the next one!\r\n</p>\r\n<br>\r\n<button type=\"button\" class=\"btn btn-outline-success float-right DoneButton\">Mark As Done</button>'),
(3, 2.1, 'CodingBasicsVariable', 'Coding Basics (Variables)', '<h2>Variables</h2>\r\n<br>\r\n<p>In this assignment we will look at variables. What they are, how they are used and how you create them.</p>\r\n<br>\r\n<p>One of the most basic things in coding, and something that you most certantly will use no matter what kind of script you make, is variables. But what is a variable? A variable is a form of container that stores data. Depending of what kind of variable you make, they will store different types of data. An int will store whole numbers, a string will store letters and a bool will only store a value of either true or false.</p>\r\n<br>\r\n<img src=\"pictures/variables.png\" class=\"img-fluid mx-auto w-100\" alt=\"\">\r\n<br><br><br>\r\n<h4>Creating variables</h4>\r\n<p>When creating a variable, you can either choose to just create it or assign it a value from the start. As seen in the example above you create a variable by fist stating the type of variable followed by the name of the variable. While the name of the variable can be whatever you want it to be (for example, you can name your int variable \"string\") it is recommended to name the variables by what data they store. If you have a string that stores the name of a person then the name of the variable is recommended to be something like name or firstName. This way you as a programmer can easily understand what data is being stored in a variable.</p>\r\n<br>\r\n<h4>Variable uses</h4>\r\n<P>Variables...\r\n</P>\r\n\r\n<button type=\"button\" class=\"btn btn-outline-success DoneButton float-right\">Mark As Done</button>'),
(4, 1.1, 'UnityBasicsCreateProject', 'Unity Basics (Create A Project)', 'You get good'),
(6, 2.2, 'CodingBasicsFunctions', 'Coding Basics (Functions)', 'Call function, make thing in function go brrr');

-- --------------------------------------------------------

--
-- Tabellstruktur `progress`
--

CREATE TABLE `progress` (
  `userID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `progress`
--

INSERT INTO `progress` (`userID`, `moduleID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `Email`) VALUES
(1, 'Holy_Mongo', 'fEtma69420', 'jagärtjock@tjockma.com'),
(2, 'Hasse', 'hansson', 'hassehansson@hassemail.se'),
(3, 'hassan', 'hassan', ''),
(4, 'nejOuiCroosang', 'Oui', 'ok@gmail.se');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`moduleID`);

--
-- Index för tabell `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`userID`,`moduleID`),
  ADD KEY `moduleID` (`moduleID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `modules`
--
ALTER TABLE `modules`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`moduleID`) REFERENCES `modules` (`moduleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
