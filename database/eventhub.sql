-- =====================================================================
--  EventHub database  —  eventhub.sql
--  Final owner: Dana (دانه)  — she adds the 15+ real records.
--
--  The table and column names below are the ones the team agreed on.
--  DO NOT rename them: every page depends on these names.
--
--  The 4 rows at the bottom are TEMPORARY test rows so everyone can
--  start working now. Dana will replace them with the final 15+ records.
--
--  Import: phpMyAdmin → Import → choose this file → Go
-- =====================================================================

CREATE DATABASE IF NOT EXISTS eventhub
  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE eventhub;

DROP TABLE IF EXISTS registrations;
DROP TABLE IF EXISTS events;

CREATE TABLE events (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  title       VARCHAR(150) NOT NULL,
  description TEXT         NOT NULL,
  category    VARCHAR(50),              -- Tech / Business / Design / Health
  event_date  DATE,
  start_time  TIME,
  location    VARCHAR(150),
  image       VARCHAR(255),             -- e.g. images/events/ai-summit.jpg
  seats       INT
);

CREATE TABLE registrations (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  event_id    INT,
  full_name   VARCHAR(100) NOT NULL,
  email       VARCHAR(120) NOT NULL,
  phone       VARCHAR(20),
  ticket_type VARCHAR(30),              -- Student / General / VIP
  created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

-- ---------------------------------------------------------------------
-- TEMPORARY test rows (Dana: replace with the final 15+ records)
-- ---------------------------------------------------------------------
INSERT INTO events (title, description, category, event_date, start_time, location, image, seats) VALUES
('AI & Future Tech Summit', 'Talks, workshops and networking about artificial intelligence.', 'Tech', '2026-12-12', '09:00:00', 'Main Hall', 'images/events/placeholder.svg', 120),
('Startup Pitch Day', 'Student teams pitch their startup ideas to a panel of judges.', 'Business', '2026-12-18', '10:00:00', 'Hall B', 'images/events/placeholder.svg', 80),
('UX Design Workshop', 'Hands-on workshop about user research and wireframes.', 'Design', '2026-12-22', '11:00:00', 'Lab 3', 'images/events/placeholder.svg', 30),
('Healthy Campus Day', 'Health checks, sports activities and nutrition tips.', 'Health', '2027-01-05', '08:30:00', 'Courtyard', 'images/events/placeholder.svg', 200);
