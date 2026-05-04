-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 04, 2026 alle 10:19
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descriz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id`, `descriz`) VALUES
(1, 'Stipendio e Entrate'),
(2, 'Rimborsi e Cash-back'),
(3, 'Spesa Alimentare'),
(4, 'Bollette e Utenze'),
(5, 'Trasporti e Carburante'),
(6, 'Casa e Affitto'),
(7, 'Salute e Farmacia'),
(8, 'Animali domestici'),
(9, 'Ristoranti e Bar'),
(10, 'Intrattenimento e Svago'),
(11, 'Abbonamenti e Servizi'),
(12, 'Shopping e Abbigliamento'),
(13, 'Viaggi e Vacanze'),
(14, 'Istruzione e Corsi'),
(15, 'Sport e Palestra'),
(16, 'Regali e Donazioni'),
(17, 'Assicurazioni'),
(18, 'Tasse e Imposte'),
(19, 'Risparmi e Investimenti');

-- --------------------------------------------------------

--
-- Struttura della tabella `portafoglio`
--

CREATE TABLE `portafoglio` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_transazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `transazione`
--

CREATE TABLE `transazione` (
  `id` int(11) NOT NULL,
  `decriz` text DEFAULT NULL,
  `tipologia` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cf` varchar(20) NOT NULL,
  `data_nascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `email`, `password`, `cf`, `data_nascita`) VALUES
(1, 'Manuel', 'Pedretti', 'manuel.pedretti@gmail.com', '1234', 'pdrmnl07r25e514l', '2007-10-25'),
(2, 'Nicolò', 'Monfrecola', 'nicolo.monfrecola@gmail.com', '1234', 'mnfncl07t12e514y', '2007-12-12'),
(3, 'Lorenzo', 'Frascogna', 'lorenzo.frascogna@gmail.com', '1234', 'frslnz07m29l319f', '2007-08-29'),
(4, 'admin', 'admin', 'admin@gmail.com', '12345', 'admin', '1900-01-01');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `portafoglio`
--
ALTER TABLE `portafoglio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_portafoglio_utente` (`id_utente`),
  ADD KEY `fk_portafoglio_transazione` (`id_transazione`);

--
-- Indici per le tabelle `transazione`
--
ALTER TABLE `transazione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transazione_categoria` (`id_categoria`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `portafoglio`
--
ALTER TABLE `portafoglio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `transazione`
--
ALTER TABLE `transazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `portafoglio`
--
ALTER TABLE `portafoglio`
  ADD CONSTRAINT `fk_portafoglio_transazione` FOREIGN KEY (`id_transazione`) REFERENCES `transazione` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_portafoglio_utente` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `transazione`
--
ALTER TABLE `transazione`
  ADD CONSTRAINT `fk_transazione_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
