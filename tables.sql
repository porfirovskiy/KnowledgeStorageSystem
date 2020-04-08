CREATE TABLE projects (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE parts (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  parent_id INT(11) NOT NULL DEFAULT 0,
  project_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  KEY `parent` (`parent_id`),
  KEY `project` (`project_id`),
  CONSTRAINT `fkProjectId` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE parts_content (
  id INT(11) NOT NULL AUTO_INCREMENT,
  content TEXT NOT NULL,
  part_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  KEY `part` (`part_id`),
  CONSTRAINT `fkPartId` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;