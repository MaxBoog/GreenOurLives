SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `search` (
  `id` tinyint(4) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `search` (`id`, `result`) VALUES
(1, '<a href=\"index.php\">Home</a>');
CREATE TABLE `tokens` (
  `id` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(23) NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xp` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `users` (`id`, `email`, `username`, `password`, `xp`, `points`) VALUES
(1, 'YUBhLm5s', 'YQ==', 'bb1437424669724c39d0db468951fd85', 275, 34),
(2, 'YkBiLm5s', 'Yg==', '6d399b1cb20db5ccc79ab9271d0fd19c', 0, 0),
(3, 'Y0BjLm5s', 'Yw==', '088ebf098f997f40032d09ccc3598551', 0, 0),
(4, 'ZEBkLm5s', 'ZA==', '8c87219e64a88579d68489583b1bb538', 0, 0),
(5, 'Z3JlZW5vdXJsaXZlc0BtYWlsaW5hdG9yLmNvbQ==', 'R29s', '4d2edc81dfd5474e0fe572bc12bb237a', 0, 0),
(6, 'ZUBlLm5s', 'ZQ==', '5d915506341699b1364cf885096f43a8', 0, 0);
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
ALTER TABLE `search`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `tokens`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;