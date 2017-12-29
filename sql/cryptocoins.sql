-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2017 at 02:05 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.12-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cryptocoins`
--

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `coinmarket_id` varchar(50) NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `added` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `name`, `coinmarket_id`, `symbol`, `added`) VALUES
(1, 'Bitcoin', 'bitcoin', 'BTC', 1514515708),
(2, 'Ethereum', 'ethereum', 'ETH', 1514515708),
(3, 'Ripple', 'ripple', 'XRP', 1514515708),
(4, 'Bitcoin Cash', 'bitcoin-cash', 'BCH', 1514515708),
(5, 'Litecoin', 'litecoin', 'LTC', 1514515708),
(6, 'Cardano', 'cardano', 'ADA', 1514515708),
(7, 'IOTA', 'iota', 'MIOTA', 1514515708),
(8, 'Dash', 'dash', 'DASH', 1514515708),
(9, 'NEM', 'nem', 'XEM', 1514515708),
(10, 'Monero', 'monero', 'XMR', 1514515708),
(11, 'EOS', 'eos', 'EOS', 1514515708),
(12, 'Bitcoin Gold', 'bitcoin-gold', 'BTG', 1514515708),
(13, 'NEO', 'neo', 'NEO', 1514515708),
(14, 'Stellar', 'stellar', 'XLM', 1514515708),
(15, 'Qtum', 'qtum', 'QTUM', 1514515708),
(16, 'Ethereum Classic', 'ethereum-classic', 'ETC', 1514515708),
(17, 'BitConnect', 'bitconnect', 'BCC', 1514515708),
(18, 'Lisk', 'lisk', 'LSK', 1514515708),
(19, 'TRON', 'tron', 'TRX', 1514515708),
(20, 'Verge', 'verge', 'XVG', 1514515708),
(21, 'ICON', 'icon', 'ICX', 1514515708),
(22, 'RaiBlocks', 'raiblocks', 'XRB', 1514515708),
(23, 'Ardor', 'ardor', 'ARDR', 1514515708),
(24, 'OmiseGO', 'omisego', 'OMG', 1514515708),
(25, 'Stratis', 'stratis', 'STRAT', 1514515708),
(26, 'Zcash', 'zcash', 'ZEC', 1514515708),
(27, 'Populous', 'populous', 'PPT', 1514515708),
(28, 'BitShares', 'bitshares', 'BTS', 1514515708),
(29, 'Waves', 'waves', 'WAVES', 1514515708),
(30, 'Tether', 'tether', 'USDT', 1514515708),
(31, 'Hshare', 'hshare', 'HSR', 1514515708),
(32, 'Bytecoin', 'bytecoin-bcn', 'BCN', 1514515708),
(33, 'Dogecoin', 'dogecoin', 'DOGE', 1514515708),
(34, 'Komodo', 'komodo', 'KMD', 1514515708),
(35, 'Binance Coin', 'binance-coin', 'BNB', 1514515708),
(36, 'SALT', 'salt', 'SALT', 1514515708),
(37, 'Siacoin', 'siacoin', 'SC', 1514515708),
(38, 'Augur', 'augur', 'REP', 1514515708),
(39, 'Steem', 'steem', 'STEEM', 1514515708),
(40, 'Golem', 'golem-network-tokens', 'GNT', 1514515708),
(41, 'Nxt', 'nxt', 'NXT', 1514515708),
(42, 'Ark', 'ark', 'ARK', 1514515708),
(43, 'Veritaseum', 'veritaseum', 'VERI', 1514515708),
(44, 'PIVX', 'pivx', 'PIVX', 1514515708),
(45, 'MonaCoin', 'monacoin', 'MONA', 1514515708),
(46, 'Decred', 'decred', 'DCR', 1514515708),
(47, 'DigiByte', 'digibyte', 'DGB', 1514515708),
(48, 'VeChain', 'vechain', 'VEN', 1514515708),
(49, 'Status', 'status', 'SNT', 1514515708),
(50, 'Byteball Bytes', 'byteball', 'GBYTE', 1514515708),
(51, 'Syscoin', 'syscoin', 'SYS', 1514515708),
(52, 'TenX', 'tenx', 'PAY', 1514515708),
(53, 'ZCoin', 'zcoin', 'XZC', 1514515708),
(54, 'Electroneum', 'electroneum', 'ETN', 1514515708),
(55, 'MaidSafeCoin', 'maidsafecoin', 'MAID', 1514515708),
(56, 'BitcoinDark', 'bitcoindark', 'BTCD', 1514515708),
(57, 'WAX', 'wax', 'WAX', 1514515708),
(58, 'Basic Attention Token', 'basic-attention-token', 'BAT', 1514515708),
(59, 'Factom', 'factom', 'FCT', 1514515708),
(60, 'Bytom', 'bytom', 'BTM', 1514515708),
(61, 'Civic', 'civic', 'CVC', 1514515708),
(62, 'DigixDAO', 'digixdao', 'DGD', 1514515708),
(63, 'Power Ledger', 'power-ledger', 'POWR', 1514515708),
(64, 'Kyber Network', 'kyber-network', 'KNC', 1514515708),
(65, '0x', '0x', 'ZRX', 1514515708),
(66, 'Santiment Network Token', 'santiment', 'SAN', 1514515708),
(67, 'Aeternity', 'aeternity', 'AE', 1514515708),
(68, 'ReddCoin', 'reddcoin', 'RDD', 1514515708),
(69, 'QASH', 'qash', 'QASH', 1514515708),
(70, 'Vertcoin', 'vertcoin', 'VTC', 1514515708),
(71, 'Aion', 'aion', 'AION', 1514515708),
(72, 'Skycoin', 'skycoin', 'SKY', 1514515708),
(73, 'Walton', 'walton', 'WTC', 1514515708),
(74, 'Dent', 'dent', 'DENT', 1514515708),
(75, 'Substratum', 'substratum', 'SUB', 1514515708),
(76, 'KuCoin Shares', 'kucoin-shares', 'KCS', 1514515708),
(77, 'GameCredits', 'gamecredits', 'GAME', 1514515708),
(78, 'FunFair', 'funfair', 'FUN', 1514515708),
(79, 'Gas', 'gas', 'GAS', 1514515708),
(80, 'aelf', 'aelf', 'ELF', 1514515708),
(81, 'NAV Coin', 'nav-coin', 'NAV', 1514515708),
(82, 'Gnosis', 'gnosis-gno', 'GNO', 1514515708),
(83, 'Dragonchain', 'dragonchain', 'DRGN', 1514515708),
(84, 'Iconomi', 'iconomi', 'ICN', 1514515708),
(85, 'SmartCash', 'smartcash', 'SMART', 1514515708),
(86, 'Bancor', 'bancor', 'BNT', 1514515708),
(87, 'GXShares', 'gxshares', 'GXS', 1514515708),
(88, 'Decentraland', 'decentraland', 'MANA', 1514515708),
(89, 'Cryptonex', 'cryptonex', 'CNX', 1514515708),
(90, 'Monaco', 'monaco', 'MCO', 1514515708),
(91, 'Blocknet', 'blocknet', 'BLOCK', 1514515708),
(92, 'Enigma', 'enigma-project', 'ENG', 1514515708),
(93, 'Ethos', 'ethos', 'ETHOS', 1514515708),
(94, 'BitBay', 'bitbay', 'BAY', 1514515708),
(95, 'Ripio Credit Network', 'ripio-credit-network', 'RCN', 1514515708),
(96, 'Raiden Network Token', 'raiden-network-token', 'RDN', 1514515708),
(97, 'Ubiq', 'ubiq', 'UBQ', 1514515708),
(98, 'Edgeless', 'edgeless', 'EDG', 1514515708),
(99, 'Request Network', 'request-network', 'REQ', 1514515708),
(100, 'Nexus', 'nexus', 'NXS', 1514515708),
(101, 'Dentacoin', 'dentacoin', 'DCN', 1514516495);

-- --------------------------------------------------------

--
-- Table structure for table `pricedata`
--

CREATE TABLE `pricedata` (
  `id` int(20) NOT NULL,
  `coin_id` int(10) NOT NULL,
  `market_rank` int(10) NOT NULL,
  `price_usd` decimal(20,10) NOT NULL,
  `price_btc` decimal(20,10) NOT NULL,
  `daily_volume` decimal(20,10) NOT NULL,
  `usd_marketcap` decimal(20,10) NOT NULL,
  `current_supply` int(50) NOT NULL,
  `total_supply` int(50) NOT NULL,
  `max_supply` int(50) NOT NULL,
  `percent_change_1h` float NOT NULL,
  `percent_change_24h` float NOT NULL,
  `percent_change_7d` float NOT NULL,
  `timestamp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricedata`
--
ALTER TABLE `pricedata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `pricedata`
--
ALTER TABLE `pricedata`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
