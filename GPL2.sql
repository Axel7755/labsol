-- MySQL Script generated by MySQL Workbench
-- lun 06 nov 2023 19:46:44
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema labsol2
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `labsol2` ;

-- -----------------------------------------------------
-- Schema labsol2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `labsol2` ;
USE `labsol2` ;

-- -----------------------------------------------------
-- Table `labsol2`.`solicitante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`solicitante` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`solicitante` (
  `idsolicitante` INT NOT NULL,
  `so_nombre` VARCHAR(35) NOT NULL,
  `so_apP` VARCHAR(35) NOT NULL,
  `so_apM` VARCHAR(35) NULL,
  `so_correo` VARCHAR(85) NOT NULL,
  `so_conthash` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idsolicitante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`proyecto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`proyecto` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`proyecto` (
  `idproyect` INT NOT NULL,
  `nombrePr` VARCHAR(45) NOT NULL,
  `proyectcol` VARCHAR(85) NOT NULL,
  `img` LONGTEXT NULL,
  `solicitante_idsolicitante` INT NULL,
  PRIMARY KEY (`idproyect`),
  INDEX `fk_proyecto_solicitante1_idx` (`solicitante_idsolicitante` ASC) ,
  CONSTRAINT `fk_proyecto_solicitante1`
    FOREIGN KEY (`solicitante_idsolicitante`)
    REFERENCES `labsol2`.`solicitante` (`idsolicitante`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`institucion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`institucion` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`institucion` (
  `idinstitucion` INT NOT NULL,
  `nombre_oficial` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`idinstitucion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`alumno` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`alumno` (
  `idalumno` INT NOT NULL,
  `al_nombre` VARCHAR(35) NOT NULL,
  `al_apP` VARCHAR(35) NOT NULL,
  `al_apM` VARCHAR(35) NULL,
  `al_correo` VARCHAR(85) NOT NULL,
  `al_conthash` VARCHAR(60) NOT NULL,
  `al_idinstitucion` INT NOT NULL,
  PRIMARY KEY (`idalumno`, `al_idinstitucion`),
  INDEX `fk_alumno_institucion1_idx` (`al_idinstitucion` ASC) ,
  CONSTRAINT `fk_alumno_institucion1`
    FOREIGN KEY (`al_idinstitucion`)
    REFERENCES `labsol2`.`institucion` (`idinstitucion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`sprint`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`sprint` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`sprint` (
  `idsprint` INT NOT NULL,
  `nombre_sp` VARCHAR(50) NOT NULL,
  `inicio` VARCHAR(45) NULL,
  `final` VARCHAR(45) NULL,
  `objetivo` LONGTEXT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `spr_idproyect` INT NOT NULL,
  PRIMARY KEY (`idsprint`, `spr_idproyect`),
  INDEX `fk_sprint_proyecto1_idx` (`spr_idproyect` ASC) ,
  CONSTRAINT `fk_sprint_proyecto1`
    FOREIGN KEY (`spr_idproyect`)
    REFERENCES `labsol2`.`proyecto` (`idproyect`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`estadoAdm`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`estadoAdm` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`estadoAdm` (
  `idestadoAdm` INT NOT NULL,
  `estadoAd` VARCHAR(35) NULL,
  `estAdm_idproyect` INT NOT NULL,
  PRIMARY KEY (`idestadoAdm`, `estAdm_idproyect`),
  INDEX `fk_estadoAdm_proyecto1_idx` (`estAdm_idproyect` ASC) ,
  CONSTRAINT `fk_estadoAdm_proyecto1`
    FOREIGN KEY (`estAdm_idproyect`)
    REFERENCES `labsol2`.`proyecto` (`idproyect`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`estadoAl`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`estadoAl` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`estadoAl` (
  `idestadoAl` INT NOT NULL,
  `estadoAl` VARCHAR(45) NULL,
  `estAl_idproyect` INT NOT NULL,
  PRIMARY KEY (`idestadoAl`, `estAl_idproyect`),
  INDEX `fk_estadoAl_proyecto1_idx` (`estAl_idproyect` ASC) ,
  CONSTRAINT `fk_estadoAl_proyecto1`
    FOREIGN KEY (`estAl_idproyect`)
    REFERENCES `labsol2`.`proyecto` (`idproyect`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`subnombre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`subnombre` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`subnombre` (
  `subnombre` VARCHAR(30) NOT NULL,
  `sub_idinstitucion` INT NOT NULL,
  PRIMARY KEY (`subnombre`, `sub_idinstitucion`),
  INDEX `fk_subnombre_institucion1_idx` (`sub_idinstitucion` ASC) ,
  CONSTRAINT `fk_subnombre_institucion1`
    FOREIGN KEY (`sub_idinstitucion`)
    REFERENCES `labsol2`.`institucion` (`idinstitucion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`tarea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`tarea` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`tarea` (
  `idtarea` INT NOT NULL,
  `tarea` VARCHAR(45) NOT NULL,
  `descripcion` LONGTEXT NULL,
  `prioridad` VARCHAR(6) NULL,
  `tarea_idtarea` INT NULL,
  `estadoAdm_idestadoAdm` INT NULL,
  `estadoAl_idestadoAl` INT NULL,
  `sprint_idsprint` INT NOT NULL,
  `ta_spr_idproyect` INT NOT NULL,
  `notificador` INT NOT NULL,
  PRIMARY KEY (`idtarea`, `tarea_idtarea`),
  INDEX `fk_tarea_tarea1_idx` (`tarea_idtarea` ASC) ,
  INDEX `fk_tarea_estadoAdm1_idx` (`estadoAdm_idestadoAdm` ASC) ,
  INDEX `fk_tarea_estadoAl1_idx` (`estadoAl_idestadoAl` ASC) ,
  INDEX `fk_tarea_sprint1_idx` (`sprint_idsprint` ASC, `ta_spr_idproyect` ASC) ,
  CONSTRAINT `fk_tarea_tarea1`
    FOREIGN KEY (`tarea_idtarea`)
    REFERENCES `labsol2`.`tarea` (`idtarea`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tarea_estadoAdm1`
    FOREIGN KEY (`estadoAdm_idestadoAdm`)
    REFERENCES `labsol2`.`estadoAdm` (`idestadoAdm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarea_estadoAl1`
    FOREIGN KEY (`estadoAl_idestadoAl`)
    REFERENCES `labsol2`.`estadoAl` (`idestadoAl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarea_sprint1`
    FOREIGN KEY (`sprint_idsprint` , `ta_spr_idproyect`)
    REFERENCES `labsol2`.`sprint` (`idsprint` , `spr_idproyect`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`etiquetas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`etiquetas` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`etiquetas` (
  `idetiquetas` INT NOT NULL,
  `etiqueta` VARCHAR(40) NOT NULL,
  `color` VARCHAR(45) NULL,
  `e_idproyect` INT NOT NULL,
  `e_idtarea` INT NULL,
  PRIMARY KEY (`idetiquetas`, `e_idproyect`),
  INDEX `fk_etiquetas_proyecto_idx` (`e_idproyect` ASC) ,
  INDEX `fk_etiquetas_tarea1_idx` (`e_idtarea` ASC) ,
  CONSTRAINT `fk_etiquetas_proyecto`
    FOREIGN KEY (`e_idproyect`)
    REFERENCES `labsol2`.`proyecto` (`idproyect`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_etiquetas_tarea1`
    FOREIGN KEY (`e_idtarea`)
    REFERENCES `labsol2`.`tarea` (`idtarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`comentario` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`comentario` (
  `idcomentario` INT NOT NULL,
  `comentario` LONGTEXT NOT NULL,
  `c_idtarea` INT NOT NULL,
  `c_idalumno` INT NOT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_comentario_tarea1_idx` (`c_idtarea` ASC) ,
  INDEX `fk_comentario_alumno1_idx` (`c_idalumno` ASC) ,
  CONSTRAINT `fk_comentario_tarea1`
    FOREIGN KEY (`c_idtarea`)
    REFERENCES `labsol2`.`tarea` (`idtarea`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comentario_alumno1`
    FOREIGN KEY (`c_idalumno`)
    REFERENCES `labsol2`.`alumno` (`idalumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`administrador` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`administrador` (
  `idadministrador` INT NOT NULL,
  `ad_nombre` VARCHAR(35) NOT NULL,
  `ad_apP` VARCHAR(35) NOT NULL,
  `ad_apM` VARCHAR(35) NULL,
  `ad_correo` VARCHAR(85) NOT NULL,
  `ad_conthash` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idadministrador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`tarea_a_alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`tarea_a_alumno` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`tarea_a_alumno` (
  `r_idtarea` INT NOT NULL,
  `r_idalumno` INT NOT NULL,
  PRIMARY KEY (`r_idtarea`, `r_idalumno`),
  INDEX `fk_tarea_has_alumno_alumno1_idx` (`r_idalumno` ASC) ,
  INDEX `fk_tarea_has_alumno_tarea1_idx` (`r_idtarea` ASC) ,
  CONSTRAINT `fk_tarea_has_alumno_tarea1`
    FOREIGN KEY (`r_idtarea`)
    REFERENCES `labsol2`.`tarea` (`idtarea`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tarea_has_alumno_alumno1`
    FOREIGN KEY (`r_idalumno`)
    REFERENCES `labsol2`.`alumno` (`idalumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`documentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`documentos` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`documentos` (
  `iddocumentos` INT NOT NULL,
  `documentoscol` LONGTEXT NULL,
  `alumno_idalumno` INT NOT NULL,
  PRIMARY KEY (`iddocumentos`, `alumno_idalumno`),
  INDEX `fk_documentos_alumno1_idx` (`alumno_idalumno` ASC) ,
  CONSTRAINT `fk_documentos_alumno1`
    FOREIGN KEY (`alumno_idalumno`)
    REFERENCES `labsol2`.`alumno` (`idalumno`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labsol2`.`proyecto_alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `labsol2`.`proyecto_alumno` ;

CREATE TABLE IF NOT EXISTS `labsol2`.`proyecto_alumno` (
  `pa_idproyect` INT NOT NULL,
  `pa_idalumno` INT NOT NULL,
  PRIMARY KEY (`pa_idproyect`, `pa_idalumno`),
  CONSTRAINT `fk_proyecto_alumno_proyecto1`
    FOREIGN KEY (`pa_idproyect`)
    REFERENCES `labsol2`.`proyecto` (`idproyect`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_proyecto_alumno_proyecto2`
    FOREIGN KEY (`pa_idalumno`)
    REFERENCES `labsol2`.`alumno` (`idalumno`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
