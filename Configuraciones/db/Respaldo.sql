-- Creación de la base de datos
CREATE DATABASE ONG;
USE ONG;

-- Tabla Administradores   1-------------------------------------------------------------
CREATE TABLE Administradores (
    ID_Administrador        INT                         PRIMARY KEY                 AUTO_INCREMENT  COMMENT 'Identificador único para cada administrador',
    Nombre_Completo         VARCHAR(255)                                NOT NULL                    COMMENT 'Nombre completo del administrador',
    Correo_Electrónico      VARCHAR(255)                UNIQUE          NOT NULL                    COMMENT 'Dirección de correo electrónico del administrador',
    Teléfono                VARCHAR(20)                                                             COMMENT 'Número de contacto del administrador',
    Dirección               VARCHAR(255)                                                            COMMENT 'Dirección completa de residencia del administrador',
    Nombre_Usuario          VARCHAR(50)                 UNIQUE          NOT NULL                    COMMENT 'Nombre de usuario único para el administrador',
    Contraseña              VARCHAR(255)                                NOT NULL                    COMMENT 'Contraseña para acceder al sistema',
    -- Rol                     ENUM('Super Administrador', 
    --                              'Administrador')                       NOT NULL                    COMMENT 'Rol del administrador dentro del sistema',
    Puesto                  VARCHAR(255)                                                            COMMENT 'Puesto del administrador dentro de la ONG',
    Título_Laboral          VARCHAR(255)                                                            COMMENT 'Título laboral del administrador',
    Fecha_Registro          TIMESTAMP DEFAULT   CURRENT_TIMESTAMP                                   COMMENT 'Fecha en que el administrador fue registrado en el sistema'
);

-- Tabla Coordinadores 2----------------------------------------------------------------
CREATE TABLE Coordinadores (
    ID_Coordinador                  INT                 PRIMARY KEY                 AUTO_INCREMENT  COMMENT 'Identificador único para cada coordinador',
    Nombre_Completo                 VARCHAR(255)                        NOT NULL                    COMMENT 'Nombre completo del coordinador',
    Fecha_Nacimiento                DATE NOT NULL                                                   COMMENT 'Fecha en que nació el coordinador',
    Género                          ENUM('Masculino', 
                                         'Femenino', 
                                         'Otro')                        NOT NULL                    COMMENT 'Género del coordinador',
    Identificación_Oficial          VARCHAR(50)                                                     COMMENT 'Identificación oficial del coordinador',
    Domicilio                       VARCHAR(255)                        NOT NULL                    COMMENT 'Dirección completa de residencia del coordinador',
    Teléfono                        VARCHAR(20)                         NOT NULL                    COMMENT 'Número de contacto del coordinador',
    Correo_Electrónico              VARCHAR(255)        UNIQUE          NOT NULL                    COMMENT 'Dirección de correo electrónico del coordinador',
    Título_Académico                VARCHAR(255)                        NOT NULL                    COMMENT 'Título académico del coordinador',
    Especialización_Cursos          TEXT                                                            COMMENT 'Especializaciones o cursos relevantes para el cargo del coordinador',
    Experiencia_Laboral             INT                                                             COMMENT 'Años de experiencia laboral del coordinador',
    Experiencia_Sector_Educativo    TEXT                                                            COMMENT 'Experiencia específica en el sector educativo o con ONGs',
    Habilidades_Clave               TEXT                                                            COMMENT 'Habilidades importantes que posee el coordinador',
    Idiomas                         VARCHAR(100)                                                    COMMENT 'Idiomas hablados por el coordinador',
    Función_Clave                   TEXT                                                            COMMENT 'Rol y responsabilidades principales del coordinador dentro de la ONG',
    Área_Supervisión                VARCHAR(255)                                                    COMMENT 'Área que supervisa el coordinador',
    Capacidad_Manejo_Equipos        INT                                                             COMMENT 'Número de personas que el coordinador supervisa directamente',
    Conocimientos_Herramientas      TEXT                                                            COMMENT 'Conocimientos específicos en herramientas o software de gestión',
    Horario_Trabajo                 VARCHAR(100)                                                    COMMENT 'Horario en el que el coordinador trabaja',
    Disponibilidad_Viajes           BOOLEAN DEFAULT                                          FALSE  COMMENT 'Disponibilidad del coordinador para viajes o traslados',
    Compromiso_ONG                  TEXT                                                            COMMENT 'Compromiso del coordinador con la misión y visión de la organización',
    Referencias_Laborales           TEXT                                                            COMMENT 'Referencias laborales proporcionadas por el coordinador',
    Motivo_Sector_Educativo         TEXT                                                            COMMENT 'Razones personales del coordinador para trabajar en el sector educativo',
    Fecha_Registro                  TIMESTAMP DEFAULT   CURRENT_TIMESTAMP                           COMMENT 'Fecha en que el coordinador fue registrado en el sistema'
);

-- Tabla Voluntarios 3---------------------------------------------------------------
CREATE TABLE Voluntarios (
    ID_Voluntario                   INT                     PRIMARY KEY                 AUTO_INCREMENT  COMMENT 'Identificador único para cada voluntario',
    Nombre_Completo                 VARCHAR(255)                            NOT NULL                    COMMENT 'Nombre completo del voluntario',
    Fecha_Nacimiento                DATE NOT NULL                                                       COMMENT 'Fecha en que nació el voluntario',
    Género                          ENUM('Masculino', 
                                         'Femenino', 
                                         'Otro')                            NOT NULL                    COMMENT 'Género del voluntario',
    Identificación_Oficial          VARCHAR(50)                                                         COMMENT 'Identificación oficial del voluntario (opcional)',
    Correo_Electrónico              VARCHAR(255)            UNIQUE          NOT NULL                    COMMENT 'Dirección de correo electrónico del voluntario',
    Teléfono                        VARCHAR(20)                             NOT NULL                            COMMENT 'Número de contacto del voluntario',
    País                            VARCHAR(100)                            NOT NULL                    COMMENT 'País de residencia del voluntario',
    Estado                          VARCHAR(100)                            NOT NULL                    COMMENT 'Estado o provincia de residencia',
    Municipio                       VARCHAR(100)                            NOT NULL                    COMMENT 'Municipio de residencia',
    Dirección                       VARCHAR(255)                                                        COMMENT 'Dirección completa de residencia del voluntario',
    Días_Disponibles                VARCHAR(100)                                                        COMMENT 'Días de la semana en los que el voluntario está disponible',
    Horario_Preferible              ENUM('Mañana', 
                                         'Tarde', 
                                         'Noche', 
                                         'Indiferente')                     NOT NULL                    COMMENT 'Horario en el que el voluntario prefiere colaborar',
    Presencial_Virtual              ENUM('Presencial', 
                                         'Virtual', 
                                         'Indiferente')                     NOT NULL                    COMMENT 'Preferencia de colaboración del voluntario',
    Experiencia_Previa              TEXT                                    NOT NULL                    COMMENT 'Experiencia previa del voluntario en actividades de voluntariado o educativas',
    Habilidades_Conocimientos       TEXT                                    NOT NULL                    COMMENT 'Habilidades o conocimientos del voluntario útiles para la ONG',
    Área_Interés                    VARCHAR(255)                            NOT NULL                    COMMENT 'Áreas en las que el voluntario está interesado en colaborar',
    Motivo_Voluntariado             TEXT                                    NOT NULL                    COMMENT 'Razones por las cuales el voluntario desea colaborar con la ONG',
    Comentarios_Adicionales         TEXT                                                                COMMENT 'Información adicional proporcionada por el voluntario',
    Declaración_Veracidad           BOOLEAN DEFAULT                                             FALSE   COMMENT 'Declaración de veracidad de la información proporcionada',
    Fecha_Registro                  TIMESTAMP DEFAULT       CURRENT_TIMESTAMP                                 COMMENT 'Fecha en que el voluntario fue registrado en el sistema'
);


-- Tabla Programas Educativos 4-------------------------------------------------------------
CREATE TABLE Programas_Educativos (
    ID_Programa                 INT PRIMARY KEY                     AUTO_INCREMENT  COMMENT 'Identificador único para cada programa educativo',
    Nombre_Programa             VARCHAR(255)            NOT NULL                    COMMENT 'Nombre del programa educativo',
    Descripción                 TEXT                    NOT NULL                    COMMENT 'Descripción detallada del programa educativo',
    Objetivos                   TEXT                    NOT NULL                    COMMENT 'Objetivos específicos del programa',
    Público_Objetivo            VARCHAR(255)            NOT NULL                    COMMENT 'Grupo o comunidad a la que está dirigido el programa',
    Duración                    INT                     NOT NULL                    COMMENT 'Duración del programa en semanas o meses',
    Fecha_Inicio                DATE NOT NULL           NOT NULL                    COMMENT 'Fecha de inicio del programa',
    Fecha_Término               DATE                    NOT NULL                    COMMENT 'Fecha de término del programa (si aplica)',
    Recursos_Necesarios         TEXT                    NOT NULL                    COMMENT 'Recursos necesarios para la implementación del programa',
    Estado                      ENUM('Planificación', 
                                     'Ejecución', 
                                     'Finalizado', 
                                     'Cancelado')       NOT NULL                    COMMENT 'Estado actual del programa educativo',
    ID_Coordinador              INT                                                 COMMENT 'Referencia al coordinador encargado del programa',
    Resultados_Esperados        TEXT                    NOT NULL                    COMMENT 'Resultados esperados al final del programa',
    Presupuesto                 DECIMAL(10, 2)          NOT NULL                    COMMENT 'Presupuesto asignado para el programa',
    Beneficiarios_Estimados     INT                                                 COMMENT 'Número estimado de beneficiarios del programa',
    Indicadores_Cumplimiento    TEXT                                                COMMENT 'Indicadores para medir el cumplimiento de los objetivos del programa',
    Comentarios_Adicionales     TEXT                                                COMMENT 'Comentarios adicionales sobre el programa',
    Fecha_Registro              TIMESTAMP DEFAULT CURRENT_TIMESTAMP                 COMMENT 'Fecha en que el programa educativo fue registrado en el sistema',
    FOREIGN KEY (ID_Coordinador) REFERENCES Coordinadores(ID_Coordinador) ON DELETE SET NULL
);

-- Tabla de Informes y Seguimientos  5 -------------------------------------------------------
CREATE TABLE Informes_Seguimientos (
    ID_Informe                  INT                     PRIMARY KEY     AUTO_INCREMENT  COMMENT 'Identificador único para cada informe de seguimiento',
    ID_Programa                 INT         NOT NULL                                    COMMENT 'Referencia al programa educativo asociado',
    ID_Coordinador              INT         NOT NULL                                    COMMENT 'Referencia al coordinador encargado del informe',
    Fecha_Informe               DATE        NOT NULL                                    COMMENT 'Fecha en que se realizó el informe',
    Resumen_Informe             TEXT        NOT NULL                                    COMMENT 'Resumen del informe o seguimiento',
    Cumplimiento_Indicadores    TEXT        NOT NULL                                    COMMENT 'Análisis del cumplimiento de los indicadores del programa',
    Desafíos_Encontrados        TEXT        NOT NULL                                    COMMENT 'Desafíos o problemas encontrados durante la ejecución del programa',
    Recomendaciones             TEXT                                                    COMMENT 'Recomendaciones para mejorar o ajustar el programa',
    Comentarios_Adicionales     TEXT                                                    COMMENT 'Comentarios adicionales sobre el seguimiento',
    Fecha_Registro              TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se registró el informe en el sistema',
    FOREIGN KEY (ID_Programa) REFERENCES Programas_Educativos(ID_Programa) ON DELETE CASCADE,
    FOREIGN KEY (ID_Coordinador) REFERENCES Coordinadores(ID_Coordinador) ON DELETE CASCADE
);


-- Tabla Beneficiarios  6 ----------------------------------------------------
CREATE TABLE Beneficiarios (
    ID_Beneficiario                 INT                  PRIMARY KEY                AUTO_INCREMENT  COMMENT 'Identificador único para cada beneficiario',
    Nombre_Completo                 VARCHAR(255)                        NOT NULL                    COMMENT 'Nombre completo del beneficiario',
    Fecha_Nacimiento                DATE                                NOT NULL                    COMMENT 'Fecha en que nació el beneficiario',
    Género                          ENUM('Masculino',
                                         'Femenino',
                                         'Otro')                        NOT NULL                    COMMENT 'Género del beneficiario',
    CURP                            VARCHAR(18)          UNIQUE         NOT NULL                    COMMENT 'Clave Única de Registro de Población del beneficiario',
    Estado_Civil                    ENUM('Soltero', 
                                        'Casado', 
                                        'Divorciado', 
                                        'Viudo', 
                                        'Otro')                                                     COMMENT 'Estado civil del beneficiario',
    Correo_Electrónico              VARCHAR(255)         UNIQUE         NOT NULL                    COMMENT 'Dirección de correo electrónico del beneficiario',
    Teléfono                        VARCHAR(20)                                                     COMMENT 'Número de contacto del beneficiario',
    País                            VARCHAR(100)                        NOT NULL                    COMMENT 'País de residencia del beneficiario',
    Estado                          VARCHAR(100)                        NOT NULL                    COMMENT 'Estado o provincia de residencia',
    Municipio                       VARCHAR(100)                        NOT NULL                    COMMENT 'Municipio de residencia',
    Colonia                         VARCHAR(100)                                                    COMMENT 'Colonia o barrio de residencia',
    Nivel_Educativo                 VARCHAR(100)                                                    COMMENT 'Nivel de educación alcanzado por el beneficiario',
    Ocupación                       VARCHAR(100)                                                    COMMENT 'Ocupación actual del beneficiario',
    Ingresos_Mensuales              DECIMAL(10, 2)                                                  COMMENT 'Ingresos mensuales del beneficiario (si aplica)',
    Número_Dependientes_Económicos  INT                                                             COMMENT 'Número de personas que dependen económicamente del beneficiario',
    Nombre_Contacto_Emergencia      VARCHAR(255)                                                    COMMENT 'Nombre de la persona a contactar en caso de emergencia',
    Teléfono_Contacto_Emergencia    VARCHAR(20)                                                     COMMENT 'Número de teléfono del contacto de emergencia',
    Relación_Contacto_Emergencia    VARCHAR(100)                                                    COMMENT 'Relación del beneficiario con la persona de contacto de emergencia',
    Fecha_Registro                  TIMESTAMP DEFAULT    CURRENT_TIMESTAMP                          COMMENT 'Fecha en que el beneficiario fue registrado en el sistema',
    ID_Programa                     INT                                                             COMMENT 'Referencia al programa educativo en el que participó el beneficiario',
    Historial_Participaciones       TEXT                                                            COMMENT 'Resumen de las participaciones del beneficiario en actividades',
    FOREIGN KEY (ID_Programa) REFERENCES Programas_Educativos(ID_Programa) ON DELETE SET NULL
);


-- Tabla Registros de Actividades 7 ------------------------------------------------------
CREATE TABLE Registros_Actividades (
    ID_Registro                 INT                 PRIMARY KEY     AUTO_INCREMENT  COMMENT 'Identificador único para cada registro de actividad',
    ID_Programa                 INT     NOT NULL                                    COMMENT 'Referencia al programa educativo asociado',
    ID_Beneficiario             INT     NOT NULL                                    COMMENT 'Referencia al beneficiario que participó en la actividad',
    Fecha_Actividad             DATE    NOT NULL                                    COMMENT 'Fecha en que se realizó la actividad',
    Descripción_Actividad       TEXT    NOT NULL                                    COMMENT 'Descripción de la actividad realizada',
    Resultados_Actividad        TEXT                                                COMMENT 'Resultados observados o logrados durante la actividad',
    Comentarios_Adicionales     TEXT                                                COMMENT 'Comentarios adicionales sobre la actividad',
    Fecha_Registro              TIMESTAMP DEFAULT CURRENT_TIMESTAMP                 COMMENT 'Fecha en que se registró la actividad en el sistema',
    FOREIGN KEY (ID_Programa) REFERENCES Programas_Educativos(ID_Programa) ON DELETE CASCADE,
    FOREIGN KEY (ID_Beneficiario) REFERENCES Beneficiarios(ID_Beneficiario) ON DELETE CASCADE
);


-- Tabla Donantes 8 --------------------------------------------
CREATE TABLE Donantes (
    ID_Donante                      INT                     PRIMARY KEY                 AUTO_INCREMENT  COMMENT 'Identificador único para cada donante',
    Nombre_Completo                 VARCHAR(255)                            NOT NULL                    COMMENT 'Nombre completo del donante',
    Correo_Electrónico              VARCHAR(255)            UNIQUE          NOT NULL                    COMMENT 'Dirección de correo electrónico del donante',
    Teléfono                        VARCHAR(20)                                                         COMMENT 'Número de contacto del donante',
    Monto_Donación                  DECIMAL(10, 2)                          NOT NULL                    COMMENT 'Cantidad de dinero donada',
    Frecuencia_Pago                 ENUM('Única',   
                                         'Mensual')                                                     COMMENT 'Frecuencia con la que el donante realiza sus aportaciones',
    Método_Pago                     ENUM('Tarjeta',                         
                                         'Transferencia',   
                                         'Efectivo')                        NOT NULL                    COMMENT 'Método utilizado para realizar la donación',
    ID_Programa                     INT                                     NOT NULL                    COMMENT 'Referencia al programa educativo de interés del donante',
    Razón_Social                    VARCHAR(255)                                                        COMMENT 'Razón social del donante si es una empresa o institución',
    RFC                             VARCHAR(13) UNIQUE                                                  COMMENT 'Registro Federal de Contribuyentes (en caso de ser aplicable)',
    Domicilio_Fiscal                VARCHAR(255)                                                        COMMENT 'Dirección fiscal del donante',
    Fecha_Registro                  TIMESTAMP DEFAULT       CURRENT_TIMESTAMP                           COMMENT 'Fecha en que el donante fue registrado en el sistema'
    -- FOREIGN KEY (ID_Programa) REFERENCES Programas_Educativos(ID_Programa) ON DELETE SET NULL
);