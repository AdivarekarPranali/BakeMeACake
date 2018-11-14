-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 06:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_order`
--

CREATE TABLE `cake_order` (
  `order_id` int(7) NOT NULL,
  `c_id` int(7) NOT NULL,
  `shipping_id` int(7) NOT NULL,
  `delivery_date` date NOT NULL,
  `total_cost` float NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `transid` varchar(200) NOT NULL,
  `transtype` varchar(200) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_order`
--

INSERT INTO `cake_order` (`order_id`, `c_id`, `shipping_id`, `delivery_date`, `total_cost`, `order_status`, `transid`, `transtype`, `addedon`, `modifiedon`) VALUES
(5, 1, 4, '0000-00-00', 750, 'Pending', '', '', '2018-04-10 19:23:04', NULL),
(15, 1, 6, '0000-00-00', 750, 'Pending', '5c68ad87f82d0502d30f', 'PAYUMONEY', '2018-04-11 05:49:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_contact` bigint(20) NOT NULL,
  `c_bldg` varchar(20) NOT NULL,
  `c_street` varchar(20) NOT NULL,
  `c_area` varchar(20) NOT NULL,
  `c_city` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_dob` varchar(20) NOT NULL,
  `c_uname` varchar(50) NOT NULL,
  `c_pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_contact`, `c_bldg`, `c_street`, `c_area`, `c_city`, `c_email`, `c_dob`, `c_uname`, `c_pass`) VALUES
(1, 'anshu', 2147483647, 'jalada', 'tata press lane', 'prabhadevi', 'mumbai', 'singhanshurani1995@gmail.com', '16 oct 1995', 'anshu', '4765aa5184b260e014fb3f6f795ba5c6'),
(2, 'hbfdvjsvhjdfhvjdvh', 87987987, 'bjhbhjbhjb', 'hbhbhjbhjb', 'hjbhbhjbj', 'bhhjbjhbhj', 'bhhjbjhbj', 'bhhjbhbjh', 'bhjbjbhjb', 'bhbhjbhjb'),
(3, 'aaaaaaaaa', 999999999, 'aaaaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa'),
(4, 'bbbbb', 2147483647, 'bbbbbbbbb', 'bbbbbbb', 'bbbbbbbb', 'bbbbbbb', 'bbbbbbbbb', 'bbbbbbbb', 'bbbbbbbbbbb', 'bbbbbbbbbb'),
(10, 'shweta', 2147483647, 'asd', 'asd', 'asd', 'asd', 'shweta@gmail.com', '', 'shweta', 'ae2b1fca515949e5d54f'),
(11, 'sh', 2147483647, 'asd', 'asd', 'asd', 'asd', 'shwetaa@gmail.com', '', 'shwetaa', 'a8f5f167f44f4964e6c9'),
(13, 'abc', 9999999999, 'abc', 'abc', 'abc', 'abc', 'abc@abc.com', '05/19/2009', 'abcde', 'ab56b4d92b40713acc5af89985d4b786'),
(14, 'abcdef', 9999999999, 'abc', 'abc', 'abc', 'abc', 'abcd@abcd.com', '05/19/2009', 'abcdef', 'e80b5017098950fc58aad83c8c14978e'),
(15, 'raj', 9876543210, 'dfgsddd', 'bnmhhj', 'nhkkh', 'jjbj', 'q@gnaul.com', '12/31/2018', 'rajpatole', '15285722f9def45c091725aee9c387cb');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `email`, `password`, `type`) VALUES
('abcde', 'abc@abc.com', 'ab56b4d92b40713acc5af89985d4b786', 1),
('abcdef', 'abcd@abcd.com', 'e80b5017098950fc58aad83c8c14978e', 1),
('ankita', 'ankita@gmail.com', 'de5b5bf65ba66517f9b7', 2),
('anshu', '', '4765aa5184b260e014fb3f6f795ba5c6', 1),
('anshurani', 'anshurani@gmail.com', '1ef7f15b036b36661b6b7d2ebbd75f21', 2),
('rajpatole', 'q@gnaul.com', '15285722f9def45c091725aee9c387cb', 1),
('rani', '', 'b9f81618db3b0d7a8be8fd904cca8b6a', 2),
('shweta', 'shweta@gmail.com', 'ae2b1fca515949e5d54f', 1),
('shwetaa', 'shwetaa@gmail.com', 'a8f5f167f44f4964e6c9', 1),
('singhanshu', 'singhanshurani1995@gmail.com', 'b9f81618db3b0d7a8be8', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(7) NOT NULL,
  `order_id` int(7) NOT NULL,
  `p_id` int(7) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(7) NOT NULL,
  `notes` text NOT NULL,
  `product_status` varchar(200) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `order_id`, `p_id`, `price`, `quantity`, `notes`, `product_status`, `addedon`, `modifiedon`) VALUES
(1, 5, 7, 200, 1, 'take care', 'Pending', '2018-04-10 19:23:04', NULL),
(13, 15, 7, 200, 1, 'happy birthday', 'Pending', '2018-04-11 05:49:20', NULL),
(14, 15, 8, 500, 1, 'happy birthday', 'Pending', '2018-04-11 05:49:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_pricekg` float NOT NULL,
  `p_flavour` varchar(200) NOT NULL,
  `p_desc` text NOT NULL,
  `p_veg` varchar(20) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `v_id` int(11) NOT NULL,
  `p_active` tinyint(1) NOT NULL DEFAULT '1',
  `p_addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `p_modifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_pricekg`, `p_flavour`, `p_desc`, `p_veg`, `p_image`, `v_id`, `p_active`, `p_addedon`, `p_modifiedon`) VALUES
(6, 'chocolate cake', 350, '', 'ccccccccccccccccccccc', 'Eggless', '626cde256149daba2cfbb528eb26f5e990fb5872.jpg', 2, 0, '2018-03-12 16:37:02', '2018-04-11 11:34:02'),
(7, 'Vanilla cake', 200, '', 'ccccccccccccccccccccc', 'Eggless', '89e53db76268ed7a96d69f2aec8417acf1bae371.jpg', 2, 1, '2018-03-12 16:37:02', '2018-04-09 00:00:00'),
(8, 'Blackforest cake', 500, '', 'bbbbbbbb', 'WithEgg', 'b67f6a35411cdf6eeae57b544ec1300695d30b1d.jpg', 2, 1, '2018-03-12 16:37:02', '2018-04-09 00:00:00'),
(9, 'Mixed fruit', 500, '', '', 'Eggless', 'dc06fd70223aeb1526e034c938d1999b1002a6f9.jpg', 2, 1, '2018-03-12 16:37:02', '2018-04-09 00:00:00'),
(10, 'Vanilla cake', 520.2, '', '', 'Eggless', '173358a1cb0adf5bedf43319151cafd1ec66b019.jpg', 3, 1, '2018-03-12 16:37:02', '2018-04-03 00:00:00'),
(11, 'Chocolate cake', 200, 'Chocolate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'Eggless', '884e1e260d43d8bd46fa088ad3a37963c2a8b8fb.jpg', 2, 1, '2018-04-03 17:12:32', NULL),
(12, 'Chocolate Cake', 100, 'Chocolate', 'Chocolate cake yuummmyyy!!', 'Eggless', '90bd21c13a54ccf68705c2598c980a3c7270b43c.jpg', 2, 1, '2018-04-19 06:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `shipping_id` int(11) NOT NULL,
  `c_id` int(7) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_id`, `c_id`, `first_name`, `middle_name`, `last_name`, `company`, `address`, `city`, `state`, `pin_code`, `country`, `contact`, `email`, `addedon`, `modifiedon`) VALUES
(3, 1, 'anshu', '', 'singh', '', 'jalada', 'mumbai', 'maharashtra', 400009, 'india', 9022585858, 'anshu@gmail.com', '2018-04-14 12:30:51', '0000-00-00 00:00:00'),
(4, 0, 'anshu', '', 'singh', '', 'jalada', 'mumbai', 'maharasadasd', 400002, 'india', 1234567890, 'anshu@gmail.com', '2018-04-10 19:15:04', '0000-00-00 00:00:00'),
(5, 1, 'test', '', 'cod', '', 'asdad', 'mumbai', 'asda', 40002, 'india', 1234567890, 'asd@gmail.com', '2018-04-14 12:30:45', '0000-00-00 00:00:00'),
(6, 1, 'shivani', '', 'datar', '', 'dombi', 'mumbai', 'maha', 400040, 'india', 9900998899, 'shivani04datar@gmail.com', '2018-04-14 12:30:48', '0000-00-00 00:00:00'),
(7, 1, 'anshu', 'rani', 'singh', 'w', 'r', 'r', 'fadf', 600015, 'hhhh', 7654321980, 'hhgggg@gmail.com', '2018-04-14 12:30:34', '0000-00-00 00:00:00'),
(8, 1, 'Yesy', '', 'id', '', 'asfad', 'mumbai', 'maharashtra', 1020202, 'India', 1234456788, 'asd@gmail.com', '2018-04-14 19:12:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(20) NOT NULL,
  `v_contact` bigint(20) NOT NULL,
  `v_bldg` varchar(20) NOT NULL,
  `v_street` varchar(20) NOT NULL,
  `v_area` varchar(20) NOT NULL,
  `v_city` varchar(20) NOT NULL,
  `v_provience` varchar(20) NOT NULL,
  `v_email` varchar(50) NOT NULL,
  `v_website` varchar(50) NOT NULL,
  `v_timings` varchar(20) NOT NULL,
  `v_uname` varchar(20) NOT NULL,
  `v_pass` varchar(200) NOT NULL,
  `v_logo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`v_id`, `v_name`, `v_contact`, `v_bldg`, `v_street`, `v_area`, `v_city`, `v_provience`, `v_email`, `v_website`, `v_timings`, `v_uname`, `v_pass`, `v_logo`) VALUES
(1, 'anshu', 999999999, 'jalada', 'tata press lane', 'prabhadevi', 'mumbai', 'india', 'singhanshurani1995', 'anshu.com', '1 - 10', 'anshu', '4765aa5184b260e014fb3f6f795ba5c6', 0x54756c6970732e6a7067),
(2, 'pranali', 999999999, 'jalada', 'tata press lane', 'Dadar', 'mumbai', 'india', 'singhanshurani1995', 'anshu.com', '1 - 10', 'rani', 'b9f81618db3b0d7a8be8fd904cca8b6a', 0x54756c6970732e6a7067),
(3, 'shivani', 999999999, 'jalada', 'tata press lane', 'Churchgate', 'mumbai', 'india', 'singhanshurani1995', 'anshu.com', '1 - 10', 'anshurani', '1ef7f15b036b36661b6b7d2ebbd75f21', 0x54756c6970732e6a7067),
(6, 'Ars', 999999999, '146', 'asdasd', 'dadar', 'mumbai', 'india', 'singhanshurani1995@gmail.com', '', '10am - 10pm', 'singhanshu', 'b9f81618db3b0d7a8be8', 0x6c6f676f2e706e67),
(7, 'ankita', 2147483647, 'jalada', 'jalada', 'dadar', 'mumbai', 'india', 'ankita@gmail.com', '', '10am - 10pm', 'ankita', 'de5b5bf65ba66517f9b7', 0x89504e470d0a1a0a0000000d4948445200000032000000320802000000915d1fe60000001974455874536f6674776172650041646f626520496d616765526561647971c9653c0000032269545874584d4c3a636f6d2e61646f62652e786d7000000000003c3f787061636b657420626567696e3d22efbbbf222069643d2257354d304d7043656869487a7265537a4e54637a6b633964223f3e203c783a786d706d65746120786d6c6e733a783d2261646f62653a6e733a6d6574612f2220783a786d70746b3d2241646f626520584d5020436f726520352e332d633031312036362e3134353636312c20323031322f30322f30362d31343a35363a32372020202020202020223e203c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e203c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a786d703d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f2220786d6c6e733a786d704d4d3d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f6d6d2f2220786d6c6e733a73745265663d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f73547970652f5265736f75726365526566232220786d703a43726561746f72546f6f6c3d2241646f62652050686f746f73686f7020435336202857696e646f7773292220786d704d4d3a496e7374616e636549443d22786d702e6969643a33354639324444433537313731314533424345443835423131383530373741312220786d704d4d3a446f63756d656e7449443d22786d702e6469643a3335463932444444353731373131453342434544383542313138353037374131223e203c786d704d4d3a4465726976656446726f6d2073745265663a696e7374616e636549443d22786d702e6969643a3335463932444441353731373131453342434544383542313138353037374131222073745265663a646f63756d656e7449443d22786d702e6469643a3335463932444442353731373131453342434544383542313138353037374131222f3e203c2f7264663a4465736372697074696f6e3e203c2f7264663a5244463e203c2f783a786d706d6574613e203c3f787061636b657420656e643d2272223f3e7a1edae6000012024944415478da9c5909701bd779de0bbb8bfb240802202892e229899728ea1675d8b29d58726ad9b13db213cbf231633bf5316d3dee749a69663a69a7ad9ad66da7b11d6732d336a96bcb89ed91655987254aa22593222989a728de040910f7b507f6e8bf581a444029c9e49103ee2e1edffbdef77ffff1dea2b3b3b3e8370dc3300441d08276c75b24d7f217854d96e5c28bfc67fe4292247522b8ce66b3ea93d57d082cd7f2d3c3357aa796c75104ee0f8405c312040e0da68cc5624b4b51b82e71961038914ea7556430a6da1fbe5a8195075484ac90b0fcf4778395c7a48ea32108f8238962381a99b83d7d6368b4afff466fcfd7a343d7688a6e5cd7f8fcf3cf1f38700090098250b824341008e4a1dc8daabb3154f4046e61a1ea2261e8a5a5d0ed89a9fe81c19e6bfd43a3b782fe608a65110c25351a361949c59780229e4dbff1c61b6fbef926c0526daa3634140afd0e58abc5b49a368092bf5d5c0c0c8fdceaed1be8ebbb31323eb1b41466390e3a6834401c9eff471cc5d9743c149c65990470f4e4934f1e3b760cfab0801b4114fd452291df8ba9084adeeed04441989bf7df1c1cb9dadbdb7f7d78727226b814114481248114454d777411b8c2108c65d3b1d04c4b73bd46a3ebe8e8387af428a88dc9300a5bf1787cb5a456eba970029ee727a7a6fbfbaf5fe9e9bb7ef3e6e4f44c2c9690648920688aa2f19c218b1855872cd200cc280a6265b9ddedb46618b6b4d475e4c891babada4c26832693c93b02828785d649a5d2b7c6c741253dbd7d8383c35333b309f84704252892d090044e62d05771383cef3dea852aff15ca6554464054f01053bb40078fcbec755a0451d26ab54f3cf1f8962d5b51f08242c3e1b9a642098723c32323577b7a7b7aaf8113cdccce6518069c9726299ad4809bc10c388ac9182aa30486825997239f3a42ded0ca739480c159369e65180da5b53acbb31c03cf45819750499411b7dd58e1b1a18aaf20070e3c840263f9b805b204595cbe7cf9c285ae9ebe1b370787e617835c360bbc5124056a515954689461565c461108008a7170124556c717f8064c4fe4c68629a4743a4a69b5950ded164729938c0766a7928928fc1f685c94a412b3aec6670741727c96c8072d82209269e6914387be3875525da2ce6c03ef006a60b1792bc86a1856e6469605a3c82e6796d57e03b05175cdf08b1b0c0e4ba917d350fee9712e93ce304994c8f18a2a3fe104274c85eb2aec5a2d85721ca7220358e7bbba77efee44a4ac3a3da5d5537ab38ce1c51e2acb782e66c3606044042354ef5c050b56a3294a5f720e05020e8229407383e5fc12d68540dc15b51456e7b363050a40ce9d3b4768281859d529c7a4b954729994bc67294c61a828411f42436bf53618bd2804a82a45e5154c393e14152e7f6a94049333029e0397eb83e01a5cc3f2f2d06408cbfb2a7c26338cd6ec30db4bf31ec4b1492e15c372125e2603089214c3013e81cfc0874e6bbc535a50345770874ab95b19573953190275a2ea3a14ca94097052438b328115aef2c5e78fac6fa8c36893d9eec4b065bd7099041b8fe4fc39b72608d684f21d485e4264864dc2a7d164fbed6887a976511fe65c55d51e8e2853aaf656ee01abacac14c23e2ec922c7241291d9887f0c8564948705640c0d0d1f79fe4f27666744e8110e8ab93a0498a30d16a3ad643926c18fb23a19dc44548a10f0521d0cbae2898aa4be895b582e40c120188acb98a49a4c8922d00dcd4a82c073229bc9b22949e44559e621ff0099a0b2a2c87bfdc68d675e7875d61fc8a6c3896850149791698d5693bd548d828ad251109808e94e9664701702a75402143d14a84ac296eb3849f94b62b9a124319be53210bac42c0f77106d4419a569add54cd5d7546fded45a0c4b1dabbf7fe0e80bafce2d047826928c86a08f8a4c6fb2991d2ec518e051b806c65323a72c2bf814152fc322f26ce5a2043084c1f2049e815f51c8550a8a95814b8dd96cae70db5b5b1ab7746c6c6e6a2cf77a401e778605173d5f5f7bf6c5d717828bd94c22110de4393398ec5667198e802c001b9e932008a3b090ccb921aac945024414798167b3020f14e11801f940923148e42525b686da359bda9bb774b4d5d7aed5e9f5cbb91f6602e514c22aaa14babbaf3cf7e2eb4bd16836134d4496f29c99cc0eabcb2dc9a0df953afb9bb8a5865659c8f25988d6591660e5801324a5a5286343431d90d2d252dfd6d2e42e2bcbcf55583a2b41a01056610c535bd7c5ee675f7a251a8f0b9954321284d4a422335a1cb6520f2043d53c98cb34325439592ecbb320639842828497e524212b8a8aae73a901dbbc79f3cfde7da7a1715d219ac2b256ad5157601551956f5f5ee87af6a5d712b1049f8e665271a821d5e710452ca53e180464ab4001049280a872661900a8a38d36bb95e1528140b0b054b7582cc78f1fdfb367cf6a58f927bf1f16b45367cefee0f5bf0e878216b39520c9c5995b6c26ae240a830932b18a4616388163a1b4d1591ceeeaa6baf51bcb5b1c1bcaab6e5feafbe0f87f8d8fdfce0f0e7d41e61f7df41120cbd3f3c7c082f6c5992f5f7be347c9249bcd26498ae2d2894c2a2a428c11b3106f644aafb1fb5c6b9b7d8d1b4bd7acb75ac2374bdf3a54fe9c0fd81a232f7e78f6a3dffcd2ef5f284466329900d9debd7bef68c71558ab8555d4c66f4fbef1573ffae2f3139077c03db392cc530ec4558f376cb4b8d66c6aa9f77bdda6b31f76389d2ced5c30bfb7ada3769dfe812fa2bf6e5d7ce8d4fb1f9c3bfdc9bcdfbf1cf7730ce974bacf3efb6cd7ae5d85c8545804f207b4e9a9e98b5d17bace9f1becb9906218d9e2c1d66ca5bd959d5bedd516b6ff0a3761b078a518e3adeeaeda5272fd446505e2435feaea3e7e06fd758b719b0997be7bff410145ce9ffc7821b000eb773a9db08780fa180803a93535351571765758a954ea5a6fef97e7ce9e3d7dba77e07a2ac523160fe2ab77dfbbcfed300f64cbbd86e42fbe3b5156edf8049bf8f9b9e035bc53ca7c8d92e66eb10649f0151e832ffdcc1a1db3b3da3a7da3a762297478ef0350665e3e77f2f6c46dd8e1d4d4ac6d68dcc0f3d9fffdd5af60ba2264a8bafb5eb1d4f8f8a54b174f7dfef9e54b97a666fd0804279b4f57b99e33babd4edb539e404d9984b1f119d9f39f13eeede5fc8f8fca7687e1873fbefe1f818d92d95386b1876af4ad0d652e833fb050766dc4bfae543252593116ab48f3b7cb9a2e779db878eed3525799d56a9d9999817801a68454f1d8638fa9c896250f86043efbfafa4e9f3e7df6ccd9c19b8369268d205a8dcb83189c90a13654baab5dd685b47072287c5f15f9a06d26c9049d9515ef8cea3f9cad2ab5707a4ac264babdcc8891bab373fc73759a4776fa2c9470f2aa2490d8d07cda672168bd71319eadadb0e9c46c6cfee6f5be2bb1780212a9c160d0ebf57001967df4d1470119940e8a110f1d3ad4ddddbdb8b808f848ca0c51c5dc51e631558e0dc45d56c38e5a27c6456406dd535f0559e1d4ade474c44ab399891199151d5bbcf6212e695b9a7eadb3f2e9430f8a88fc97c72ffedf6872891b7f78534586888f8788b4aee67ad85f21b2eb6ba7bca13ff3d53f37efdc1a8d26a589418655b6848043dded7df0c10770dbdcdcac3c191e1e0619953a5deee6f5257b25ece8d27d0fdddff650291e2246af2d88a84c6b0d46a3e1c6647022941e09f1e3696a8a2b79d6dffa3dbafae55d4d8eb586ee607c717ece4c23114ebc35173813c6af73d68bc39133ac673224bdb2fe86d9e499f6876b2cac5998128441aa741fae5b2bb2499e49332c4ba86726b90660207078bddee58235954e5136ba79733b5dbeb0c1dbfeef63efb56c2f637bf191f1c0442475753af2f5747c3acc4a906c64c4a9975a6b2c3b5db5fc5ca6d96a1b96b31712dcf1fe99b7cf0f5d9b8dec76caa5685a40098fdbec5b871cd6beecd4399286fb6696b0b4a97382db1d0ca1d56ea3c7570576cc72698e632193aafb29f81c1c1c2c7395adec95338188152d6551f752a84feeb75e79d7cf71e5562d99482545656b2e2bf5492ee8a6046c4c8e0d2f047a47fdff30dad3c7b294a1248668b433fd7f7f5fd5bffec5f3bbcb0dc3fe5068769ec31dc70247ae4d79cd181ae724264b6833113c3adaf5d515939eac6d6ce158489a1ca36c3f154cb02be7787e3118c1f3c52e04b8d9994937e2f1465a3b6b0e91f5478e1c3eec5ab7273cf655221696a1a8556a282523837ba678f416921af309c1b6f6267bfd91f636af518e4a42321ad5700911d70c0cf49e63ed9184e0cb26d0b1f3d389f7aae9e37cb29436baf85424914c8503feddbbb68b5aa7cdac4bc623906aa1a89c9f9fefeeb9b1ffde0788c2cd38d48937af5ef17ea7a2b6daa9a96e3be89506164b228fff30fdb3d7390949889ca8f4547041d589a3743329a5cb49b4ba311c4bb556b48c86d84f6f0d7cfa6f27919232d454e57157adf369a30b63686ac11a9d16cdf59fc4e50e2158e75be77356990dfa13dd43a9e07c707ac83f37bd10585a0c8643d184c9e66ede5043e43639523e5d723c77e6c447de52bb3eca1d5b6c8bf4f49efffc383cd551282fc88c00f054c23001417b66b25ba5f3b76299b1459c9d9a77589226349bf0b47a1a5d4cd54ef370c88e59ade5c8022e2787e88b17971c7519962af747638c7f34393318f54f44a2b1448a49311c548a00c160347dff8987d75657a27a83319d4ac2e6b962cdda858559369386ead051e23cf89d43269339eea8f8b43bb271dbbdd5c8fcfb3fffbba8848bb416c1b4202404a76482c608d2a1c533124e9b9a8e547dbd4b33f7d3a47536b381ddb8ce4fb7ac990b6f70d25f8527252e4546174cf169746e38b338c1a4d33c0c855002245601d6aca95b5bb967f7cefdf7ee6b6b6d562c07d55c3a16a669dd8edddff2fb27fd3313f1788465396fb9efc1879fc86cde37a069dd9a9eb42354787ae47ffefb1f59941634948cd30841abc80c3aaace6124b2de7b5cc13aef2f92f5c8db5d0783818af0da1a2c92168393647482f60fd1313f6c6b50824629232c0c6a792d4d5656b8766edf74efbedd4d4deb755a9d7a4a05718bc0314aa7373399f8e8c880cb5d6e7394c6e331f87a6e76e6ecc94f1eb159b3b54497a331f2d95567d22f0b38cf2549232a20a87a580b012395966e6685ed65f14d65d3166be55b7d4424a55d0847e9e177b1e0a82619a02409d79a30bd15d5bb6514d7537485cfb573dbc67d7b766c58dfa0d71bd4129ee3b895a2d951562d89acc8b3e9541cea5fb026c732f9cabaaea97dc3c60e3f87d982338e852f1f7aa2e1d252ed3f7d384819b4595c2b0161048510249067365a9c3a2c10f427425122729b6216704924b526dae4c04823ec2c289aaaf2b9776e69ddd3b9ada5699dde6050a750f71479406a5a245e7ef1e84ffee56d0d85e965240dc55d3a557094808c5eefa12476c39acac7d357dabc896ce8466dad8b39d8f8ce89619246a0b017a14a13109c4da4166e26638b041b352202491b685b3946ea118ca469e0a66cdb96d67d9ddb5a9bd71b8d46757035f7a9e5a8bcaaa12cc3fce0d53fffe5fbc7691287bd36934917eeb3e5dc79caee9ddbf73678f6d31fdb505626354bb507fee49f03698e876d84c026d14c0ce353182269281da5b713c00d825294d657eedeb6a56defeeaded6dcd5025e741e40b98a277052a3eb5030a712c1e8f3ff5f4b3e7bb2e51242e304c3a932cac76944a1245f7766eacab48acb53267afa217c685ac8060d90c2270ca0e9ad211b411a774080a12d05694bb37b737dfb377076c8ead565b11258535bb7aab2253d1acc04a2412505a4c4e4e3e7ef8fbc363b7481ce39954269356ce9b90156424499479abfda154964d5098a08114465204a903cf0215039cf272cf964d6dfbf7eddabab9dd6eb717cd5d08a888a4229e965fc0a827cd50f75cb97af5f053cf8422310d8ac2c6269d4915bd16c81dad931a00a8a1519ce41194c0355e4f19a0b96fff9eed5b37973a4b7f079a3b025a0d6b99adfcb93c88f1371f7ff2c28bafa098722806e559707126938a016b8482488341c8c1085142708270b99c9b366dfcd6fe7d3b766cf5b83df97d7a118ec25d43d15ba0bc595753a56c31d43f802c994c1e3cf06dd836fdcddf1e23343ac8073a93d36875f22c032183e3785c269c367b477bdb03f7dfd3b96b474545c5ddd01421280257c45391b696df90c1a0ead91fdc2493a9234f7f0f45b19fbcf5d3b191519dd16ab6430094f406acb373c7b71fb81fd0acadae86ca4879edc6431693eff686ec6eafef8a0c57c8d66f050828970b5f8f81f9a0e8191a1e3e79ea8b797f40a7d3d754576eee6887cd13442051394e10ee68a93be2bb23a0225877bc45a1c4c99f81e7cf5e288a224952565f49e278219a3ffa35e7ef6e452f3bff5f800100e2b239cc66abc2170000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payment`
--

CREATE TABLE `vendor_payment` (
  `vp_id` int(7) NOT NULL,
  `v_id` int(7) NOT NULL,
  `od_id` int(7) NOT NULL,
  `total_payment` float NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake_order`
--
ALTER TABLE `cake_order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `transid` (`transid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `v_id_2` (`v_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
  ADD PRIMARY KEY (`vp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake_order`
--
ALTER TABLE `cake_order`
  MODIFY `order_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
  MODIFY `vp_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `cake_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
