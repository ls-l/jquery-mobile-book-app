-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2013 at 08:38 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `performance`
--

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

CREATE TABLE IF NOT EXISTS `dimensions` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`id`, `name`) VALUES
(1, 'Professional Knowledge'),
(2, 'Teaching Techniques'),
(3, 'Motivation of Students'),
(4, 'Classroom Management'),
(5, 'Communication'),
(6, 'Support For and Co-operation With Colleagues'),
(7, 'Contribution to Wider School Activities');

-- --------------------------------------------------------

--
-- Table structure for table `dimension_sub`
--

CREATE TABLE IF NOT EXISTS `dimension_sub` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `dimension_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dimension_sub`
--

INSERT INTO `dimension_sub` (`id`, `dimension_id`, `name`) VALUES
(1, 1, 'Professional knowledge'),
(2, 1, 'Curriculum'),
(3, 1, 'Understand the implications of the Treaty of Waitangi and te rea me ona tikanga'),
(4, 1, 'Learning and Assessment Theory'),
(5, 2, 'Planning and Preparation'),
(6, 2, 'Teaching and learning strategies'),
(7, 2, 'Assessment/Reporting'),
(8, 2, 'Use of Resources and Technology'),
(9, 3, 'Student engagement in learning'),
(10, 3, 'Expectations that value and promote learning'),
(11, 4, 'Student Behaviour'),
(12, 4, 'Physical environment'),
(13, 4, 'Respect and understanding'),
(14, 5, 'Communication'),
(15, 5, 'Students'),
(16, 5, 'Colleagues'),
(17, 5, 'Families/whanau'),
(18, 6, 'Support for and co-operation With colleagues'),
(19, 7, 'Contribution to wider school activities');

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE IF NOT EXISTS `evidence` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `evidence`
--

INSERT INTO `evidence` (`id`, `url`) VALUES
(34, './uploads/326784Gy_12_1_13-1.jpg'),
(33, './uploads/846527contact.jpg'),
(32, './uploads/516322TalentEngagementContract.pdf'),
(31, './uploads/485408export.txt'),
(30, './uploads/962592Photo_00001.jpg'),
(29, './uploads/101728Photo_00001.jpg'),
(35, './uploads/6329351.52346950-20130310.pdf'),
(36, './uploads/46333test.txt');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE IF NOT EXISTS `goals` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL,
  `dimension_id` int(6) NOT NULL,
  `goal_title` varchar(200) NOT NULL,
  `term_1_goal` text NOT NULL,
  `term_1_notes` text NOT NULL,
  `term_1_rank` int(2) NOT NULL,
  `term_2_goal` text NOT NULL,
  `term_2_notes` text NOT NULL,
  `term_2_rank` int(2) NOT NULL,
  `term_3_goal` text NOT NULL,
  `term_3_notes` text NOT NULL,
  `term_3_rank` int(2) NOT NULL,
  `term_4_goal` text NOT NULL,
  `term_4_notes` text NOT NULL,
  `term_4_rank` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `uid`, `dimension_id`, `goal_title`, `term_1_goal`, `term_1_notes`, `term_1_rank`, `term_2_goal`, `term_2_notes`, `term_2_rank`, `term_3_goal`, `term_3_notes`, `term_3_rank`, `term_4_goal`, `term_4_notes`, `term_4_rank`) VALUES
(1, 1, 3, 'Example Goal 1', '<p>aa</p>', '<p>sss67</p>', 1, '', '', 1, '', '', 1, '<p><span style="text-decoration: underline;">ssefsf</span></p>', '', 1),
(4, 1, 4, 'Test 3', '<p>11</p>', '<p>22</p>', 0, '<p>33</p>', '<p>44</p>', 1, '<p>55</p>', '<p>66</p>', 0, '<p>77</p>', '<p>88</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

CREATE TABLE IF NOT EXISTS `indicators` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `dimension_sub_id` int(6) NOT NULL,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `indicators`
--

INSERT INTO `indicators` (`id`, `dimension_sub_id`, `name`) VALUES
(1, 1, 'Identifies own professional development opportunities and communicates to appraiser when establishing performance expectations'),
(2, 1, 'Attends teacher development programmes'),
(3, 1, 'Participates in whole school and other professional development activities including those held outside of the school day'),
(4, 1, 'Possesses a copy, and complies with the contents of the school’s staff handbooks, organization manuals and operation plans'),
(5, 1, 'Has sound knowledge of and consistently follows the policies and procedures of the school'),
(6, 1, 'Initiates and organizes own professional development solutions'),
(7, 1, 'Advises and mentors less experienced teachers on matters of professional knowledge'),
(8, 2, 'Fully understands and articulates the school’s rationale for most of its curriculum practice'),
(9, 2, 'Translates national curriculum statements into curriculum guidelines for the school and  prepares implementation plan'),
(10, 2, 'Has sound knowledge of current special education theory and practice'),
(11, 2, 'Shows evidence of use of national curriculum documents in planning'),
(12, 2, 'Reflects current curriculum theory in participation and leadership in curriculum developments'),
(13, 3, 'Incorporates and continually seeks further way to incorporate, elements of te reo and tikanga Maori into lessons and classroom'),
(14, 3, 'Initiates and develops resources which incorporate elements of te reo and tikanga Maori'),
(15, 3, 'Acknowledges the particular knowledge and experiences of Maori students and actively seeks  to incorporate into lessons'),
(16, 4, 'Leads and participates in the development and review of assessment systems and methods'),
(17, 4, 'Fully understands the cycle of teaching, learning and assessment and the relationship between the components'),
(18, 5, 'Prepares lesson plans in advance of classes and in accordance with school’s standards'),
(19, 5, 'Consistently demonstrates a balanced coverage of the seven essential learning areas in  lesson plans'),
(20, 5, 'Understands and makes use of the relationships among topics and concepts and demonstrates this when planning lessons'),
(21, 5, 'Consistently involves students in aspects of planning and goal setting for the lessons'),
(22, 5, 'Organises and displays to effect required resources and technology ahead of classes'),
(23, 5, 'Takes account of individual needs when planning and preparing'),
(24, 6, 'Consistently identifies each student’s abilities and learning needs and structure lessons that  target those abilities and needs'),
(25, 6, 'Readily adapts own teaching approaches and techniques to maximise students’ learning  opportunities and achievements;'),
(26, 6, 'Always incorporates all eight essential skills into the delivery of lessons'),
(27, 6, 'Always caters to different learning styles by presenting lessons that stimulate a variety of  senses'),
(28, 6, 'Acknowledges the particular knowledge and experiences of students from different cultures and always incorporates into lessons'),
(29, 6, 'Consistently reflects on own teaching approaches and techniques and takes action to  improve;'),
(30, 6, 'Constantly seeks out new ways to facilitate learning outcomes'),
(31, 6, 'Provides advice and support to colleagues on teaching and learning strategies'),
(32, 7, 'Gives full, constructive, and timely feedback to students about their work'),
(33, 7, 'Uses a compete range of assessment methods to form an overall picture of students’  achievements'),
(34, 7, 'Gathers assessment information that is a valid indicator of students’ abilities and assists less  experienced colleagues in this task'),
(35, 7, 'Collects information for assessment purposes which is always consistent with regular  classroom activities'),
(36, 7, 'Bases assessment of students on evidence of their achievements'),
(37, 7, 'Keeps up to date and accurate records of student assessments, both formative and  summative'),
(38, 7, 'Marks students’ work according to assessment criteria'),
(39, 7, 'Designs and participates in moderation exercises'),
(40, 7, 'Complies summative reports on time and in accordance with the school’s assessment  approach, e.g. portfolio reports'),
(41, 7, 'Feedback to family/whanau is full, frank and constructive, and includes information on  strategies that will help improve student learning'),
(42, 7, 'Always uses assessment results to improve the teaching, learning and assessment cycle'),
(43, 8, 'Uses a variety of resources and technologies in teaching’'),
(44, 8, 'Uses resources and technologies that are appropriate to the learning objectives for the lesson  and in such a way that enthuses students for further development study'),
(45, 9, 'Students are active and focused participants in the learning process'),
(46, 9, 'Students demonstrate enthusiasm and enjoyment in classes'),
(47, 9, 'Lessons are always varied and challenging'),
(48, 9, 'Praises students’ achievements'),
(49, 10, 'Students are always aware of what they can achieve'),
(50, 10, 'Encourages students to take responsibility for their own learning'),
(51, 10, 'Encourages students to involve families/whanau in their learning'),
(52, 10, 'Creates a positive environment where students have the confidence to take risks with their  learning'),
(53, 11, 'Always applies and clearly communicates school’s behaviour management model to  students (PBS)'),
(54, 11, 'Involves and gains acceptance from students in establishing the rules for the classroom'),
(55, 11, 'Establishes clear and effective classroom routines'),
(56, 11, 'Applies a variety of processes in organising and motivating students'),
(57, 12, 'Always assesses and plans to minimise risks to students’ physical safety and takes  appropriate action'),
(58, 12, 'Promotes student engagement in learning through classroom layout'),
(59, 12, 'Often alters the classroom layout to enhance learning opportunities while maintaining  effective classroom routines'),
(60, 12, 'Reinforces students’ achievements through classroom displays'),
(61, 13, 'Respects the right of students, colleagues and family/whanau to have their own beliefs  and values'),
(62, 13, 'Expresses a positive attitude towards people'),
(63, 13, 'Encourages students to value and appreciate each other'),
(64, 13, 'Reflects students’ concerns and is easy to talk to'),
(65, 13, 'Listens when approached by others and asks questions'),
(66, 14, 'Modifies approach (language and effect) to gain rapport with students, colleagues and family/whanau'),
(67, 14, 'Maintain confidentiality and trust'),
(68, 14, 'Listens attentively and asks questions'),
(69, 15, 'Uses positive reinforcement to encourage desired behaviours'),
(70, 16, 'Seeks assistance from colleagues when unsure or misunderstands situation'),
(71, 17, 'Recognises and values the input of families/whanau to the school'),
(72, 17, 'Helps ensure families/whanau have opportunities to be involved in students’ learning'),
(73, 17, 'Effectively handles difficult inquiries from family/whanau'),
(74, 17, 'Supports less experienced colleagues to effectively handle difficult inquiries from family/  whanau'),
(75, 17, 'Addresses groups of family/whanau as the school’s representative'),
(76, 18, 'Is aware of the contribution of other staff to the school'),
(77, 18, 'Co-operates with colleagues on tasks that require working in collaboration'),
(78, 18, 'Actively supports decisions taken by team or school'),
(79, 18, 'Willingly meets with other teachers on a regular basis to exchange information and ideas'),
(80, 18, 'Takes a leading role in sharing knowledge of curriculum and teaching techniques to improve performance or help others'),
(81, 18, 'Initiates and participates in the development of teaching resources, strategies and  techniques'),
(82, 18, 'Is considerate towards colleagues in sharing resources and technology'),
(83, 19, 'Willingly participates in students’ extra curriculum activities'),
(84, 19, 'Willingly participates in activities which benefit colleagues or the school as a whole'),
(85, 19, 'Participates in the development of proposed modifications to and development of the  school’s policies and programmes'),
(86, 19, 'Teaches in off-site locations as required by the annual organization plan of the school'),
(87, 19, 'Participates in school wide reviews by collating and analysing information on the  school’s performance'),
(88, 19, 'Leads a staff group or syndicate');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `responsible` varchar(50) NOT NULL,
  `appraiser` int(6) NOT NULL,
  `current_step` varchar(50) NOT NULL,
  `salary_date` varchar(50) NOT NULL,
  `trb_num` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`, `class`, `room`, `responsible`, `appraiser`, `current_step`, `salary_date`, `trb_num`, `role`, `username`, `password`) VALUES
(1, 'alan', 'Montefiore', 'Class 1', '12a', 'Kevin', 4, '2', '21/03/2014', '23542367', 'user', 'alan', '02558a70324e7c4f269c69825450cec8'),
(2, 'Alice', 'Brooking', 'Class 2', '14 b', 'Bruce', 4, '2', '21/03/2014', '46636632', 'user', 'alice', '6384e2b2184bcbf58eccf10ca7a6563c'),
(3, 'Alan', 'Montefiore', '', '', '', 0, '', '', 'srg34tggw3g', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'Kim', 'Montefiore', '', '', '', 0, '12', '', 'sgg24tgvw', 'appraiser', 'kim', 'fb1eaf2bd9f2a7013602be235c305e7a');

-- --------------------------------------------------------

--
-- Table structure for table `staff_ind_progress`
--

CREATE TABLE IF NOT EXISTS `staff_ind_progress` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL,
  `ind_id` int(6) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `staff_ind_progress`
--

INSERT INTO `staff_ind_progress` (`id`, `uid`, `ind_id`, `status`) VALUES
(1, 2, 3, 0),
(2, 2, 4, 1),
(3, 2, 5, 1),
(4, 2, 6, 1),
(5, 1, 4, 1),
(6, 2, 7, 1),
(7, 1, 3, 1),
(8, 1, 7, 1),
(9, 1, 6, 1),
(10, 2, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_progress`
--

CREATE TABLE IF NOT EXISTS `staff_progress` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL,
  `task_id` int(6) NOT NULL,
  `evidence` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `staff_progress`
--

INSERT INTO `staff_progress` (`id`, `uid`, `task_id`, `evidence`, `status`) VALUES
(24, 2, 1, '29,30,31', 1),
(25, 2, 2, '0', 1),
(26, 2, 4, '0', 1),
(27, 2, 3, '0', 1),
(28, 2, 5, '0', 1),
(29, 2, 6, '0', 1),
(30, 1, 1, '0', 1),
(31, 1, 5, '0', 1),
(32, 1, 6, '0', 1),
(33, 1, 3, '0', 1),
(34, 1, 10, '0', 1),
(35, 1, 2, '0', 1),
(36, 1, 4, '0', 1),
(37, 1, 44, '0', 1),
(38, 1, 91, '0', 1),
(39, 1, 92, '0', 1),
(40, 1, 93, '0', 1),
(41, 1, 94, '0', 0),
(42, 1, 85, '0', 0),
(43, 1, 45, '0', 1),
(44, 1, 326, '0', 1),
(45, 1, 327, '0', 1),
(46, 2, 76, '0', 0),
(47, 1, 0, '32', 0),
(48, 1, 0, '33', 0),
(49, 1, 0, '0', 0),
(50, 1, 0, '0', 0),
(51, 1, 30, '0', 0),
(52, 1, 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `indicator_id` int(6) NOT NULL,
  `name` varchar(500) NOT NULL,
  `code` varchar(50) NOT NULL,
  `conditions` text NOT NULL,
  `criteria` text NOT NULL,
  `notes` text NOT NULL,
  `importance` int(2) NOT NULL,
  `difficulty` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=365 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `indicator_id`, `name`, `code`, `conditions`, `criteria`, `notes`, `importance`, `difficulty`) VALUES
(30, 1, 'Writes action plans for operation plan objectives for role', '', '', '', '', 1, 3),
(27, 1, 'Checks all Standards & Guides when issued and files in Standards Folder', '', '', '', '', 0, 0),
(28, 1, 'Negotiates level of delegation for school wide responsibilities with senior management', '', '', '', '', 0, 0),
(29, 1, 'Checks  school operation plan  for background to annual objectives relevant to personal role', '', '', '', '', 0, 0),
(20, 1, 'Identifies own professional development needs', '', '', '', '', 0, 0),
(16, 1, 'Checks previous performance document and records recommendations on current document', '', '', '', '', 0, 0),
(17, 1, 'Checks staff development and performance management policies & procedures', '', '', '', '', 0, 0),
(18, 1, 'Sets up Performance Appraisal Document and folder for current year and files docs.', '', '', '', '', 0, 0),
(19, 1, 'Self Assesses own performance on MOE dimensions & indicators, standards & guides', '', '', '', '', 0, 0),
(26, 1, 'Gives feedback with evidence on personal achievement  on own and school goals in appraisal meeting', '', '', '', '', 0, 0),
(31, 1, 'Writes action plans for personal development goals', '', '', '', '', 0, 0),
(32, 6, 'Initiates meeting with professional development supervisor re personal development action plan& seeks feedback ', '', '', '', '', 0, 0),
(33, 6, 'Seeks approval from PD.manager including budget if required and sets own up development opportunities', '', '', '', '', 0, 0),
(34, 6, 'Assesses quality of presentation and participation at development opportunities and knowledge & skills gained', '', '', '', '', 0, 0),
(35, 6, 'Gives feedback to manager after development opportunities', '', '', '', '', 0, 0),
(36, 2, 'Attends MTR scheduled development opportunities including Induction Programmes', '', '', '', '', 0, 0),
(37, 2, 'Checks own attendance at staff develop opportunities, records in appraisal document and presents at appraisal', '', '', '', '', 0, 0),
(38, 2, 'Files training and course notes in school system and personal perforamnce & Induction  file', '', '', '', '', 0, 0),
(39, 2, 'Gives feedback to supervisor &  presentation at staff meeting as required by PD manager.', '', '', '', '', 0, 0),
(40, 2, 'Reads selected books & journals/journal articles and shares information at staff meetings or teaching team meetings', '', '', '', '', 0, 0),
(41, 2, 'Reads selected books and journals and shares information at staff meetings', '', '', '', '', 0, 0),
(42, 3, 'Attends professional support & development activities incl. off-site and outside school hours', '', '', '', '', 0, 0),
(43, 4, 'Checks MTR Handbooks,organisation manuals,strategic plans when planning class programmes', '', '', '', '', 0, 0),
(44, 4, 'Sets up and completes Attendance register incl. ETAP electronic copy, according to MOE regulations ', '', '', '', '', 0, 0),
(45, 4, 'Contacts parents re student absence if no notification from parents/caregivers', '', '', '', '', 0, 0),
(46, 4, 'Notifies Team Leaders of absence if unexplained for more than 3 days', '', '', '', '', 0, 0),
(47, 4, 'Writes class timetables ', '', '', '', '', 0, 0),
(48, 4, 'Compiles relievers folder ', '', '', '', '', 0, 0),
(49, 4, 'Complies with duty responsibilities', '', '', '', '', 0, 0),
(50, 4, 'Meets organisational deadlines', '', '', '', '', 0, 0),
(51, 4, 'Reads ETAP Bulletin daily, displays in class and acts on instructions', '', '', '', '', 0, 0),
(52, 4, 'Reads supervision emails or notes and acts on instructions or consults with supervisor if unsure', '', '', '', '', 0, 0),
(53, 4, 'Completes ETAP service diary', '', '', '', '', 0, 0),
(54, 4, 'Transports students as required after providing proof of clear license to administration', '', '', '', '', 0, 0),
(55, 4, 'Monitors/adjusts teacher aide hrs of work to suit class programme & keeps within allocated hrs', '', '', '', '', 0, 0),
(56, 4, 'Checks and amends teacher aides & CST task list re class organisation  & programmes', '', '', '', '', 0, 0),
(57, 4, 'Signs off teacher aide extra hrs claims ,dirt monery and absences and send to office', '', '', '', '', 0, 0),
(58, 4, 'Conducts transition meeting when student changing class for info. and resource transfer', '', '', '', '', 0, 0),
(59, 4, 'Sends all past programmes and relevant info. Incl. copy of IEP to office for filing in main file', '', '', '', '', 0, 0),
(60, 4, 'Files IEP,Curriculum checklists and info. into class individual student Green & Brown Folders', '', '', '', '', 0, 0),
(61, 4, 'Sends  originals of letters and other information on students if received at satellite into base for file', '', '', '', '', 0, 0),
(62, 4, 'Proof reads documents', '', '', '', '', 0, 0),
(63, 4, 'Completes documents accurately', '', '', '', '', 0, 0),
(64, 4, 'Attends case meetings', '', '', '', '', 0, 0),
(65, 4, 'Refers students to CST or PBS for support', '', '', '', '', 0, 0),
(66, 4, 'Purchases items for class within budget allocation', '', '', '', '', 0, 0),
(67, 4, 'Writes classroom routines', '', '', '', '', 0, 0),
(68, 4, 'Sets up systems to enhance classroom management and organisation', '', '', '', '', 0, 0),
(69, 4, 'Writes IEPS with reference to MTR Handbook and within deadlines', '', '', '', '', 0, 0),
(70, 4, 'Conducts regular equipment checks for H & S and maintenance & informs administration', '', '', '', '', 0, 0),
(71, 4, 'Checks policies & sets up class systems for students with health requirements', '', '', '', '', 0, 0),
(72, 5, 'Checks ORRS fundholder standards in planning class programmes and organisation', '', '', '', '', 0, 0),
(73, 5, 'Updates class Policy Folders', '', '', '', '', 0, 0),
(74, 5, 'Conducts policy & procedure review meetings with teacher aides', '', '', '', '', 0, 0),
(75, 5, 'Reviews or writes policies & procedures as required by management and in accodance with the MTR guidelines', '', '', '', '', 0, 0),
(76, 7, 'Coaches less experienced teachers on professional knowledge tasks', '', '', '', '', 0, 0),
(77, 8, 'Describes rationale for school and class curriculum practice when required', '', '', '', '', 0, 0),
(78, 9, 'Attends team and school-wide curriculum planning meetings and shares ideas', '', '', '', '', 0, 0),
(79, 9, 'Writes curriculum implementation plans for whole-school or syndicate.', '', '', '', '', 0, 0),
(80, 10, 'Selects and uses special education programmes when appropriate for individual student''s prog.', '', '', '', '', 0, 0),
(81, 11, 'Checks class planning against school curriculum policies and procedures', '', '', '', '', 0, 0),
(82, 11, 'Checks student progress against national achievement statements in curriculum areas incl. E Levels', '', '', '', '', 0, 0),
(83, 11, 'Writes curriculum statements', '', '', '', '', 0, 0),
(84, 12, 'Gives feedback using current curriculum theory in discussions around curriculum ', '', '', '', '', 0, 0),
(85, 13, 'Includes te reo in programme as appropriate and at relevant level for class students', '', '', '', '', 0, 0),
(86, 13, 'Incorporates tikanga Maori in class organisation & student management', '', '', '', '', 0, 0),
(87, 14, 'Writes or selects class  teaching resources, and strategies that incorporate te reo', '', '', '', '', 0, 0),
(88, 14, 'Attends training about Maori & other ethnic groups incl. marae visit', '', '', '', '', 0, 0),
(89, 15, 'Gather information about  knowledge and experience of Maori students .', '', '', '', '', 0, 0),
(90, 15, 'Uses protocol and te reo appropriate to student level.', '', '', '', '', 0, 0),
(91, 16, 'Attends assessment training & seeks coaching if unsure', '', '', '', '', 0, 0),
(92, 16, 'Gives feedback on assessment methods and systems as part of school assessment review', '', '', '', '', 0, 0),
(93, 17, 'Describes the links between assessment results and the development of class programmes', '', '', '', '', 0, 0),
(94, 17, 'Links teaching practice to achievement of students and amends strategies according to plans', '', '', '', '', 0, 0),
(95, 18, 'Prepares lesson plans & determines resources needed in advance', '', '', '', '', 0, 0),
(96, 18, 'Conducts lessons according to Mtr Richmond agreed format.', '', '', '', '', 0, 0),
(97, 19, 'Writes weekly programme that includes 8  essential learning areas', '', '', '', '', 0, 0),
(98, 19, 'Prioritises essential learning areas to suit individual student need', '', '', '', '', 0, 0),
(99, 20, 'Includes key learning concepts as part of teaching of Topic studies', '', '', '', '', 0, 0),
(100, 20, 'Checks all prescribed topics for classes in School Plan Part 3 and includes in term programme', '', '', '', '', 0, 0),
(101, 20, 'Asseses student understanding of concepts prior to conducting lessons and differentiates goals to suit', '', '', '', '', 0, 0),
(102, 20, 'Checks contents of resource boxes & uses contents that are appropriate for class/student level', '', '', '', '', 0, 0),
(103, 21, 'Conducts planning and goals setting meetings with students where appropriate', '', '', '', '', 0, 0),
(104, 22, 'Prepares technology and resource support required for lessons before school starts each day', '', '', '', '', 0, 0),
(105, 22, 'Displays resources & technology such that students'' use is coached through environmental cues', '', '', '', '', 0, 0),
(106, 23, 'Differentiates class into groups of students functioning at similar levels and plans for their needs', '', '', '', '', 0, 0),
(107, 23, 'Prepares for lessons taking into account  individual learning needs.', '', '', '', '', 0, 0),
(108, 23, 'Checks Circle of Courage Developmental audit of students when prioritising and planning curriculum', '', '', '', '', 0, 0),
(109, 24, 'Selects age appropriate classroom activities and resources for indiividual students to incorporate into lessons', '', '', '', '', 0, 0),
(110, 24, 'Selects teaching strategies that support individual learning needs & learning styles', '', '', '', '', 0, 0),
(111, 24, 'Seeks feedback on differentiated class curriculum to analyse individual provision', '', '', '', '', 0, 0),
(112, 25, 'Conducts lessons individualised  for students that include teacher aide and CST in delivery.', '', '', '', '', 0, 0),
(113, 25, 'Selects specialised strategies to suit individual student''s learning styles and disability needs', '', '', '', '', 0, 0),
(114, 25, 'Writes  teaching techniques appropriate to students'' learning needs in curriculum statement and IEP', '', '', '', '', 0, 0),
(115, 25, 'Selects and prompts students with prompt levels appropriate to individual students', '', '', '', '', 0, 0),
(116, 25, 'Reinforces student participation using selected reinforcers', '', '', '', '', 0, 0),
(117, 26, 'Provides daily opportunities for students to practice and generalise key competencies', '', '', '', '', 0, 0),
(118, 26, 'Selects learning situations that involve the use of more than one key competency', '', '', '', '', 0, 0),
(119, 27, 'Selects a variety of media, methods and activities for use in lesssons', '', '', '', '', 0, 0),
(120, 27, 'Checks students preferred learning styles through class observation data', '', '', '', '', 0, 0),
(121, 28, 'Checks diverse cultures of class students and seeks information about their cultural customs & practices', '', '', '', '', 0, 0),
(122, 28, 'Selects opportunities to include diverse cultural customs of students into class lessons', '', '', '', '', 0, 0),
(123, 29, 'Checks own teaching strategies for effectivesness by taking observation baseline data & amends if req.', '', '', '', '', 0, 0),
(124, 29, 'Seeks feedback after class observation sessions and acts on recommendations', '', '', '', '', 0, 0),
(125, 29, 'Seeks advice from colleagues in order to improve teaching and learning', '', '', '', '', 0, 0),
(126, 30, 'Uses technology to support lessons and provide learning experiences', '', '', '', '', 0, 0),
(127, 30, 'Discusses lesson objectives with teacher aides', '', '', '', '', 0, 0),
(128, 30, 'Prioritises functional life skills after students turn 16 years of age', '', '', '', '', 0, 0),
(129, 30, 'Actions and monitors programmes developed in consultation with specialists & therapists', '', '', '', '', 0, 0),
(130, 30, 'Amends IEPs in ETAP', '', '', '', '', 0, 0),
(131, 30, 'Conducts IEP planning and review meetings', '', '', '', '', 0, 0),
(132, 30, 'Coaches teacher aides to action specialist programmes under supervision eg. Derbyshire', '', '', '', '', 0, 0),
(133, 30, 'Uses a variety of media and methods to communicate with students', '', '', '', '', 0, 0),
(134, 30, 'Conducts information sharing meetings with specialist staff & managers involved with class students', '', '', '', '', 0, 0),
(135, 30, 'Seeks coaching from senior staff for facilitating student learning outcomes', '', '', '', '', 0, 0),
(136, 31, 'Models and coaches all specialised teaching techniques and strategies for colleagues when required', '', '', '', '', 0, 0),
(137, 31, 'Conducts observations of colleagues'' teaching practice and gives feedback', '', '', '', '', 0, 0),
(138, 32, 'Selects PBS strategies and procedures to reinforce student achievement by checking PBS handbook', '', '', '', '', 0, 0),
(139, 32, 'Develops reward plan to reinforce students promptly  for achievement', '', '', '', '', 0, 0),
(140, 32, 'Coaches students to perform tasks correctly through precision teaching strategies', '', '', '', '', 0, 0),
(141, 33, 'Checks MTR Assessment Handbook for class information and selects tools specified', '', '', '', '', 0, 0),
(142, 34, 'Assesses students curriculum, cognitive, communication,physical and social needs', '', '', '', '', 0, 0),
(143, 34, 'Coaches teacher aides to gather data on student achieve. across all areas of the Curric. & IEP goals', '', '', '', '', 0, 0),
(144, 34, 'Monitors student progress on psychologists & therapists assessment tools and checklists as required', '', '', '', '', 0, 0),
(145, 34, 'Records skill gains using decreasing prompt levels to indicate progress for very high needs students', '', '', '', '', 0, 0),
(146, 34, 'Tracks/records progress at intervals prescribed on MTR tools ', '', '', '', '', 0, 0),
(147, 35, 'Assesses student progress on all timetabled activities, PBS checklists, health (ie.seizures) and IEP goals', '', '', '', '', 0, 0),
(148, 35, 'Assesses students using Circle of Courage developmental audit', '', '', '', '', 0, 0),
(149, 35, 'Records student progress according to Mt Richmond procedures and timelines', '', '', '', '', 0, 0),
(150, 36, 'Conducts assessment after checking previous data and starts from level of previous achievement ', '', '', '', '', 0, 0),
(151, 36, 'Assesses students with reference to  observation based data & video evidence& tests', '', '', '', '', 0, 0),
(152, 36, 'Assesses students using a variety of methods relevant to the students'' ability levels', '', '', '', '', 0, 0),
(153, 37, 'Writes class schedule for updating class checklists', '', '', '', '', 0, 0),
(154, 37, 'Files student assessments in Green or Brown folders according to procedures', '', '', '', '', 0, 0),
(155, 37, 'Files current ongoing checklists and charts in files that are accessible to classrooom staff', '', '', '', '', 0, 0),
(156, 37, 'Files observation data obtained through video on CD as well as computer, or intranet ', '', '', '', '', 0, 0),
(157, 37, 'Completes PBS monitoring as required by PBS team', '', '', '', '', 0, 0),
(158, 38, 'Assess students  NZ curriculum levels & IEP goals using MOE/MTR exemplars & E Levels', '', '', '', '', 0, 0),
(159, 39, 'Attends assessment moderation  meetings', '', '', '', '', 0, 0),
(160, 40, 'Writes reports on student progress for parents/caregivers', '', '', '', '', 0, 0),
(161, 40, 'Writes student progress reports for other professionals as required within timelines', '', '', '', '', 0, 0),
(162, 40, 'Files copies of reports in student master file in office', '', '', '', '', 0, 0),
(163, 40, 'Completes weekly report & checks feedback from senior management,acts on recommendations', '', '', '', '', 0, 0),
(164, 40, 'Reports critical incidents in ETAP', '', '', '', '', 0, 0),
(165, 40, 'Reports on IEP & NZ Curric goals in ETAP identifying student competency using E levels', '', '', '', '', 0, 0),
(166, 41, 'Writes to parents/caregivers in clear concise English and compiles information CD/DVD for parents', '', '', '', '', 0, 0),
(167, 41, 'Conducts report interviews with parents/caregivers using positive and constructive language', '', '', '', '', 0, 0),
(168, 41, 'Discusses assessment potfolios with parents and planned strategies for future programmes', '', '', '', '', 0, 0),
(169, 41, 'Gives parents feedback re progress using a variety of media', '', '', '', '', 0, 0),
(170, 42, 'Seeks feedback through attending an information sharing meeting with team leader  using student''s assess. results as the basis of the discussion', '', '', '', '', 0, 0),
(171, 42, 'Analyse student''s levels of social skills in order to develop focused participation in class programme', '', '', '', '', 0, 0),
(172, 42, 'Identifies and analyses individual Barriers to Learning for basis for IEP & class goals', '', '', '', '', 0, 0),
(173, 42, 'Amends programmes and IEP objectives after considering assessment results', '', '', '', '', 0, 0),
(174, 43, 'Selects a variety of resources from MTR Resource library,intranet & internet', '', '', '', '', 0, 0),
(175, 43, 'Renews resources for ongoing programmes', '', '', '', '', 0, 0),
(176, 43, 'Checks Access-It programme for current and new resources that are available', '', '', '', '', 0, 0),
(177, 44, 'Selects a variety of appropriate ICT and classroom resources to meet lesson objectives', '', '', '', '', 0, 0),
(178, 44, 'Observes students and gathers data on ICT and classroom resources that they find interesting', '', '', '', '', 0, 0),
(179, 44, 'Selects ICT & resources for lessons that are evidence-based preferences derived from observation of enjoyment.', '', '', '', '', 0, 0),
(180, 45, 'Selects strategies and activities that are age appropriate, developmentally & culturally  appropriate', '', '', '', '', 0, 0),
(181, 45, 'Gives students positive reinforcement and feedback  for on-task behaviour', '', '', '', '', 0, 0),
(182, 45, 'Gives positive reinforcement to students'' attempts at new tasks', '', '', '', '', 0, 0),
(183, 45, 'Analyses on-task behaviour and writes action plans to increase on-task behaviour', '', '', '', '', 0, 0),
(184, 45, 'Writes student objectives appropriate to student cognitive levels', '', '', '', '', 0, 0),
(185, 45, 'Trains teacher aides to give priority to reinforcing on-task behaviour', '', '', '', '', 0, 0),
(186, 45, 'Sets up classroom layout and routines to give learning support to stud. learning tasks', '', '', '', '', 0, 0),
(187, 45, 'Reinforces students engagement before commencing lesson or activities', '', '', '', '', 0, 0),
(188, 45, 'Selects instructions , questions and prompts to focus student participation', '', '', '', '', 0, 0),
(189, 45, 'Analyses student social skills levels such that staff use appropriate communic.methods to engage', '', '', '', '', 0, 0),
(190, 46, 'Rewards students for achievements', '', '', '', '', 0, 0),
(191, 46, 'Gives reinforcements at rates to suit individual cognitive levels', '', '', '', '', 0, 0),
(192, 46, 'Gives opportunities for students to choose activities and reinforcers', '', '', '', '', 0, 0),
(193, 46, 'Analyses student motivators and selects for class reinforcement programme', '', '', '', '', 0, 0),
(194, 46, 'Students take initiative in learning situations and freely give feedback to staff thru. positive comments or smiles', '', '', '', '', 0, 0),
(195, 47, 'Writes learning goals that are challenging for students', '', '', '', '', 0, 0),
(196, 47, 'Writes a roster  that varies equipment to be used to reinforce learning content for curriculum areas  from one lesson to another', '', '', '', '', 0, 0),
(197, 47, 'Provides opportunities for students to generalise use of skills across varied settings and activities', '', '', '', '', 0, 0),
(198, 48, 'Checks rate of reinforcers for students using PBS forms and analyses for staff accuracy', '', '', '', '', 0, 0),
(199, 48, 'Seeks feedback from supervisers about classroom reinforcement rate and effectiveness', '', '', '', '', 0, 0),
(200, 48, 'Provides opportunities for students to receive positive feedback through public award situations', '', '', '', '', 0, 0),
(201, 49, 'Informs students about individual and group goals using visual aids & other cues', '', '', '', '', 0, 0),
(202, 49, 'Displays and refers to student''s/class  learning objectives', '', '', '', '', 0, 0),
(203, 50, 'Reinforces students who take responsibility at any level for their own learning programmes', '', '', '', '', 0, 0),
(204, 51, 'Coaches students to show their work to parents & seek assistance at home ', '', '', '', '', 0, 0),
(205, 52, 'Reinforces students who choose to try more challenging activities even when there is a risk of failure', '', '', '', '', 0, 0),
(206, 52, 'Coaches students using positive language on activities that they have found difficult', '', '', '', '', 0, 0),
(207, 53, 'Describes school/class aims for student behaviour each day using cues if necessary and reinforces students who comply', '', '', '', '', 0, 0),
(208, 53, 'Conducts meetings with students when appropriate to establish class/playground rules for behaviour', '', '', '', '', 0, 0),
(209, 53, 'Uses restorative justice procedures for students for serious instances of inappropriate behaviour', '', '', '', '', 0, 0),
(210, 53, 'Displays and uses visual cues to coach students'' on appropriate behaviour', '', '', '', '', 0, 0),
(211, 54, 'Meets with class students where appropriate and  writes rules in positive language using visuals where appropriate', '', '', '', '', 0, 0),
(212, 54, 'Displays class rules in classroom in format appropriate to students'' levels of functioning', '', '', '', '', 0, 0),
(213, 55, 'Displays routines in a variety of media to suit students including visual timetables, photostorys on CDs etc.', '', '', '', '', 0, 0),
(214, 55, 'Reinforces students who remember and follow class routines', '', '', '', '', 0, 0),
(215, 56, 'Analyses student''s learning behaviours', '', '', '', '', 0, 0),
(216, 56, 'Analyses level of on-task behaviour in class programmes & individual activities', '', '', '', '', 0, 0),
(217, 56, 'Conducts situational analysis (debriefing) following critical incidents,records in ETAP & on form', '', '', '', '', 0, 0),
(218, 56, 'Tracks/records behaviour frequencies to establish baseline data and assess change', '', '', '', '', 0, 0),
(219, 56, 'Identifies/selects and uses strategies to engage individual students in class lessons', '', '', '', '', 0, 0),
(220, 56, 'Trains teacher aides in selected strategies for reinforcing individual students', '', '', '', '', 0, 0),
(221, 56, 'Selects consequences when appropriate and analyses effectiveness by monitoring using PBS forms', '', '', '', '', 0, 0),
(222, 56, 'Writes reinforcement schedules for individual students', '', '', '', '', 0, 0),
(223, 56, 'Conducts behaviour support meetings consulting and/or involving parents and other staff', '', '', '', '', 0, 0),
(224, 56, 'Writes behaviour support plans for students', '', '', '', '', 0, 0),
(225, 56, 'Attends NVCI training , gains certificate and uses strategies', '', '', '', '', 0, 0),
(226, 56, 'Restrains students using NVCI strategies', '', '', '', '', 0, 0),
(227, 57, 'Checks classroom environment for safe location of furniture and resources ', '', '', '', '', 0, 0),
(228, 57, 'Sets up class environment to improve student/staff safety', '', '', '', '', 0, 0),
(229, 57, 'Completes Hazard & Safety notification forms and sends to administration for action', '', '', '', '', 0, 0),
(230, 57, 'Checks ICT and electrical equipment', '', '', '', '', 0, 0),
(231, 57, 'Sets up safe systems for managing student physical and personal care including medication', '', '', '', '', 0, 0),
(232, 57, 'Writes Risk Management Plans for all class programmes', '', '', '', '', 0, 0),
(233, 58, 'Sets up classroom equipment to enhance specialised learning programmes ie TEACCH', '', '', '', '', 0, 0),
(234, 58, 'Stores equipment in systematic and accessible manner', '', '', '', '', 0, 0),
(235, 58, 'Checks equipment and furniture and contacts administration re replacement or repairs', '', '', '', '', 0, 0),
(236, 58, 'Seeks upgrade to equipment to meet changing student needs', '', '', '', '', 0, 0),
(237, 58, 'Checks and returns shared resources and equipment by deadlines', '', '', '', '', 0, 0),
(238, 58, 'Checks classroom staff clean and tidy classroom after learning activities', '', '', '', '', 0, 0),
(239, 58, 'Labels objects and areas in the classroom to prompt learners when appropriate', '', '', '', '', 0, 0),
(240, 58, 'Seeks specialist advice for class layout and takes action on recommendations', '', '', '', '', 0, 0),
(241, 59, 'Analyses class layout for suitability for student learning needs', '', '', '', '', 0, 0),
(242, 59, 'Alters class layout as required to enhance learning opportunities', '', '', '', '', 0, 0),
(243, 59, 'Discusses radical layout changes and describes rationale to classroom staff and managers', '', '', '', '', 0, 0),
(244, 59, 'Coaches students to adapt to changed layout', '', '', '', '', 0, 0),
(245, 60, 'Displays students achievement objectives and achievements', '', '', '', '', 0, 0),
(246, 60, 'Takes photographs of class activities, art & craft displays and makes into books and wall displays ', '', '', '', '', 0, 0),
(247, 60, 'Sets up wall displays of student work using back drops, borders or mounted attractively', '', '', '', '', 0, 0),
(248, 61, 'Conducts family/whanau meetings to share ideas and discuss issues freely and frankly', '', '', '', '', 0, 0),
(249, 61, 'Attends cultural meetings and takes part in activities', '', '', '', '', 0, 0),
(250, 61, 'Seeks advice about beliefs and values of other cultures', '', '', '', '', 0, 0),
(251, 62, 'Articulates positive statements about students, their families and colleagues', '', '', '', '', 0, 0),
(252, 62, 'Reinforces students'' positive behaviour towards adults in their environment', '', '', '', '', 0, 0),
(253, 63, 'Reinforces students'' positive behaviour towards each other', '', '', '', '', 0, 0),
(254, 64, 'Sets aside times to talk to students during the school day', '', '', '', '', 0, 0),
(255, 64, 'Checks issues with students and finds solutions that are agreeable to both parties', '', '', '', '', 0, 0),
(256, 64, 'Advocates for class students in other forums outside the classroom', '', '', '', '', 0, 0),
(257, 64, 'Analyses students personal interactions with class staff and uses reinforcement to increase levels of interaction', '', '', '', '', 0, 0),
(258, 65, 'Stops to listen to students requests', '', '', '', '', 0, 0),
(259, 65, 'Reinforces students to ask questions,talk to teacher at approp. times and to use approp.approaches', '', '', '', '', 0, 0),
(260, 65, 'Clarifies student/staff communications by asking questions', '', '', '', '', 0, 0),
(261, 65, 'Analyses student social skills using Pro-Social Tools and coaches student pro-social behaviour', '', '', '', '', 0, 0),
(262, 65, 'Uses active listening techniques when interracting with students and adults', '', '', '', '', 0, 0),
(263, 66, 'Selects communication styles appropriate and relevant to each situation-students/colleagues/family', '', '', '', '', 0, 0),
(264, 66, 'Greets student and family/whanau in their language', '', '', '', '', 0, 0),
(265, 67, 'Checks school confidentiality practices and student information sheets', '', '', '', '', 0, 0),
(266, 67, 'Selects level of confidentiality for the situation', '', '', '', '', 0, 0),
(267, 67, 'Checks  student level of publicity agreement and amends orgasnisation when necessary', '', '', '', '', 0, 0),
(268, 68, 'Attends to speaker and asks questions that are relevant to the conversation', '', '', '', '', 0, 0),
(269, 68, 'Relates to students/staff and families with tact and sensitivity', '', '', '', '', 0, 0),
(270, 68, 'Discusses difficult situations or problems using constructive supportive statements', '', '', '', '', 0, 0),
(271, 68, 'Models correct and appropriate oral and written language', '', '', '', '', 0, 0),
(272, 68, 'Speaks in a clear audible voice with appropriate tone', '', '', '', '', 0, 0),
(273, 68, 'Selects a variety of communication skills to use -active listening,questionning,creating rapport,assertion etc', '', '', '', '', 0, 0),
(274, 69, 'Reinforces students using PBS strategies to encourage desired behaviour', '', '', '', '', 0, 0),
(275, 69, 'Relates to students in a non-judgemental way', '', '', '', '', 0, 0),
(276, 69, 'Speaks to students positively without denigration or put-downs', '', '', '', '', 0, 0),
(277, 69, 'Allows students time to process questions when waiting for a reply', '', '', '', '', 0, 0),
(278, 69, 'Distributes prompts/questions evenly across students during lessons', '', '', '', '', 0, 0),
(279, 69, 'Implements a range of communication strategies in the class such that each student can respond', '', '', '', '', 0, 0),
(280, 70, 'Consults with colleagues', '', '', '', '', 0, 0),
(281, 70, 'Seeks assistance from colleagues and supervisors if unsure', '', '', '', '', 0, 0),
(282, 70, 'Attends conflict resolution meetings if necessary', '', '', '', '', 0, 0),
(283, 70, 'Gives fair criticism with solutions that encompass school aims and objectives', '', '', '', '', 0, 0),
(284, 71, 'Reinforces family/whanau for input into school/class', '', '', '', '', 0, 0),
(285, 72, 'Creates opportunities for families/whanau to be involved in school programme', '', '', '', '', 0, 0),
(286, 72, 'Makes at least 3 home visits to students homes during the school year', '', '', '', '', 0, 0),
(287, 72, 'Communicates with parents through home/school notebooks,telephone calls, morning teas etc', '', '', '', '', 0, 0),
(288, 72, 'Facilitates morning teas in the classroom for parents and caregivers which are both social and learning oriented', '', '', '', '', 0, 0),
(289, 72, 'Seeks families out at school events and talks about their child', '', '', '', '', 0, 0),
(290, 72, 'Checks with parents re mode of communication that is appropriate', '', '', '', '', 0, 0),
(291, 72, 'Seeks approval from senior manager to use interpretor if required', '', '', '', '', 0, 0),
(292, 72, 'Records all instances of family contact in ETAP', '', '', '', '', 0, 0),
(293, 72, 'Regularly informs family/whanau about class/school activities (Minimum monthly))', '', '', '', '', 0, 0),
(294, 72, 'Writes and distributes a class newsletter to parents at the end of each term', '', '', '', '', 0, 0),
(295, 72, 'Analyses family support needs through contacts', '', '', '', '', 0, 0),
(296, 72, 'Seeks permission from family to refer family to SST Social Worker for support unless welfare issue', '', '', '', '', 0, 0),
(297, 72, 'Selects level of confidentiality regarding parent conversations and disclosures and seeks advice', '', '', '', '', 0, 0),
(298, 72, 'Trains parents to support child''s programmes at home', '', '', '', '', 0, 0),
(299, 73, 'Seeks help from senior managers or principal if family has issues or makes difficult enquiries', '', '', '', '', 0, 0),
(300, 73, 'Refers family/student urgently to SST & DP  if serious concerns re stuudent/family welfare', '', '', '', '', 0, 0),
(301, 74, 'Attends family/whanau meetings to support colleagues when needed', '', '', '', '', 0, 0),
(302, 74, 'Coaches colleagues in active listening and problem solving strategies', '', '', '', '', 0, 0),
(303, 75, 'Conducts verbal presentations about MTR values,programmes and organisation to family/whanau/community groups ', '', '', '', '', 0, 0),
(304, 76, 'Checks school plan documentation relating to school organisation and staff responsibilities', '', '', '', '', 0, 0),
(305, 76, 'Seeks support  for any area of work from the appropriate people ', '', '', '', '', 0, 0),
(306, 76, 'Writes Relievers Handbook for class ', '', '', '', '', 0, 0),
(307, 77, 'Collaborates with colleagues on joint projects', '', '', '', '', 0, 0),
(308, 77, 'Assists colleagues to perform their duties or responsibilities if needed', '', '', '', '', 0, 0),
(309, 77, 'Attends meetings to develop resources, strategies and techniques', '', '', '', '', 0, 0),
(310, 77, 'Conducts meetings with support staff re school policies and procedures', '', '', '', '', 0, 0),
(311, 78, 'Seeks clarification of rationale for decisions if unsure or disagrees', '', '', '', '', 0, 0),
(312, 78, 'Actions decisions made by syndicate or school', '', '', '', '', 0, 0),
(313, 79, 'Exchanges ideas and shares knowledge with colleagues', '', '', '', '', 0, 0),
(314, 79, 'Discusses innovative ideas with colleagues', '', '', '', '', 0, 0),
(315, 79, 'Completes conference reports and gives verbal, visual feedback at staff meetings', '', '', '', '', 0, 0),
(316, 79, 'Gives feedback to colleagues from observations in other schools', '', '', '', '', 0, 0),
(317, 79, 'Volunteers to train other staff on new skills', '', '', '', '', 0, 0),
(318, 80, 'Informs & demonstrates new  resources,techniques  and strategies to colleagues', '', '', '', '', 0, 0),
(319, 80, 'Informs staff re new MOE curriculum developments', '', '', '', '', 0, 0),
(320, 80, 'Seeks training in new strategies and techniques and facilitates workshops to train others', '', '', '', '', 0, 0),
(321, 81, 'Attends resource and teaching strategies development meetings', '', '', '', '', 0, 0),
(322, 81, 'Identifies need for new resources & strategies. ', '', '', '', '', 0, 0),
(323, 82, 'Informs library if there are resources missing from classroom', '', '', '', '', 0, 0),
(324, 82, 'Collects and returns resources by due dates', '', '', '', '', 0, 0),
(325, 82, 'Shares resources with other classes if needed when supplies are limited', '', '', '', '', 0, 0),
(326, 83, 'Attends students'' extra curricular school activities', '', '', '', '', 0, 0),
(327, 83, 'Attends parent meetings', '', '', '', '', 0, 0),
(328, 84, 'Acts on  school-wide delegations', '', '', '', '', 0, 0),
(329, 84, 'Attends appraisal meetings', '', '', '', '', 0, 0),
(330, 84, 'Gives feedback on colleagues performance for annual appraisal  if sought', '', '', '', '', 0, 0),
(331, 84, 'Appraises teacher aides', '', '', '', '', 0, 0),
(332, 84, 'Trains teacher aides to perform duties in class', '', '', '', '', 0, 0),
(333, 84, 'Gives feedback and positive reinforcement to teacher aides', '', '', '', '', 0, 0),
(334, 84, 'Gives teacher aides clear concise instructions', '', '', '', '', 0, 0),
(335, 84, 'Reinforces teacher aides for high level of hands on deployment with students', '', '', '', '', 0, 0),
(336, 84, 'Conducts fortnightly administration meetings with teacher aides and writes minutes', '', '', '', '', 0, 0),
(337, 84, 'Conducts problem solving meetings with teacher aides to find solutions for student/staff issues', '', '', '', '', 0, 0),
(338, 84, 'Coordinates staff related tasks in the classroom and records on displayed timetable', '', '', '', '', 0, 0),
(339, 84, 'Attends BOT activities', '', '', '', '', 0, 0),
(340, 84, 'Checks class staff  read bulletins & notices and act on instructions', '', '', '', '', 0, 0),
(341, 84, 'Checks compliance on class staff personnel requirements', '', '', '', '', 0, 0),
(342, 84, 'Attends staff social activities', '', '', '', '', 0, 0),
(343, 84, 'Reads all bulletins and memos and acts on directives within deadlines', '', '', '', '', 0, 0),
(344, 84, 'Checks supervisory comments from senior managers and acts on recommendations', '', '', '', '', 0, 0),
(345, 84, 'Seeks personal advice, guidance and support from management', '', '', '', '', 0, 0),
(346, 84, 'Copes with unexpected situations and crises in a calm and self-controlled manner', '', '', '', '', 0, 0),
(347, 84, 'Comments positively about the school to other groups and forums', '', '', '', '', 0, 0),
(348, 85, 'Attends school policy & programme review meetings and gives feedback', '', '', '', '', 0, 0),
(349, 85, 'Gives feedback for development of school strategic plans and objectives', '', '', '', '', 0, 0),
(350, 85, 'Gives feedback on school organisation and resource upgrades', '', '', '', '', 0, 0),
(351, 85, 'Gathers data for school review', '', '', '', '', 0, 0),
(352, 85, 'Conducts  policy & programme review meetings', '', '', '', '', 0, 0),
(353, 86, 'Meets with manager to discuss class placement for ensuing year and gives feedback ', '', '', '', '', 0, 0),
(354, 86, 'Checks & complies with Satellite Memorandum of Agreement', '', '', '', '', 0, 0),
(355, 86, 'Facilitates information-sharing meetings with host school staff', '', '', '', '', 0, 0),
(356, 86, 'Takes class to host school assemblies and other events', '', '', '', '', 0, 0),
(357, 86, 'Writes Integration programme for individual satellite students at host school', '', '', '', '', 0, 0),
(358, 86, 'Checks host school programmes  that involve satellite students and meets expected participation level', '', '', '', '', 0, 0),
(359, 86, 'Checks host school communications and complies with relevant requests and required actions', '', '', '', '', 0, 0),
(360, 87, 'Collates school-wide data on selected annual objectives', '', '', '', '', 0, 0),
(361, 87, 'Analyses data ,checks against hypotheses and writes summary statements', '', '', '', '', 0, 0),
(362, 87, 'Conducts  meetings to review progress & record meeting outcomes', '', '', '', '', 0, 0),
(363, 87, 'Gives feedback to colleagues, senior management and BOT on achievement of objectives', '', '', '', '', 0, 0),
(364, 87, 'Gives recommendations for future actions', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_score`
--

CREATE TABLE IF NOT EXISTS `task_score` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL,
  `task_id` int(6) NOT NULL,
  `score` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `task_score`
--

INSERT INTO `task_score` (`id`, `uid`, `task_id`, `score`) VALUES
(1, 1, 30, 2),
(2, 2, 76, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_score_commonuser`
--

CREATE TABLE IF NOT EXISTS `task_score_commonuser` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL,
  `task_id` int(6) NOT NULL,
  `score` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `task_score_commonuser`
--

INSERT INTO `task_score_commonuser` (`id`, `uid`, `task_id`, `score`) VALUES
(1, 1, 30, 3),
(2, 1, 27, 4),
(3, 1, 97, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
