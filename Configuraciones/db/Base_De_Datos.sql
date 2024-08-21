-- Creación de la base de datos "TECNOLOGIA Y EDUCACIÓN : CERRANDO LA BRECHA DIGITAL"
CREATE DATABASE ong;
USE ong;

-- TABLA DE USUARIOS "ADMINISTRADORES, COORDINADORES, VOLUNTARIOS"
CREATE TABLE Usuarios (
    ID_Usuario                   INT                     PRIMARY KEY               AUTO_INCREMENT    COMMENT 'Identificador único para cada usuario',
    Nombre_Completo              VARCHAR(255)                            NOT NULL                    COMMENT 'Nombre completo del usuario',
    Fecha_Nacimiento             DATE                                    NOT NULL                    COMMENT 'Fecha en que nació el usuario',
    Genero                       ENUM('Masculino', 
                                      'Femenino', 
                                      'Otro')                            NOT NULL                    COMMENT 'Género del usuario',
    Identificacion_Oficial       VARCHAR(50)                                 NULL                    COMMENT 'Identificación oficial del usuario (opcional)',
    Correo_Electrónico           VARCHAR(255)            UNIQUE          NOT NULL                    COMMENT 'Dirección de correo electrónico del usuario',
    Telefono                     VARCHAR(20)                             NOT NULL                    COMMENT 'Número de contacto del usuario',
    Pais                         VARCHAR(100)                            NOT NULL                    COMMENT 'País de residencia del usuario',
    Estado                       VARCHAR(100)                            NOT NULL                    COMMENT 'Estado o provincia de residencia',
    Municipio                    VARCHAR(100)                            NOT NULL                    COMMENT 'Municipio de residencia',
    Direccion                    VARCHAR(255)                                NULL                    COMMENT 'Dirección completa de residencia del usuario',
    Días_Disponibles             VARCHAR(100)                                NULL                    COMMENT 'Días de la semana en los que el usuario está disponible',
    Horario_Preferible           ENUM('Mañana',                                   
                                      'Tarde', 
                                      'Noche', 
                                      'Indiferente')                     NOT NULL                    COMMENT 'Horario en el que el usuario prefiere colaborar',
    Presencial_Virtual           ENUM('Presencial', 
                                      'Virtual', 
                                      'Indiferente')                     NOT NULL                    COMMENT 'Preferencia de colaboración del usuario',
    Experiencia_Previa           TEXT                                    NOT NULL                    COMMENT 'Experiencia previa del usuario en actividades de voluntariado o educativas',
    Habilidades_Conocimientos    TEXT                                    NOT NULL                    COMMENT 'Habilidades o conocimientos del usuario útiles para la ONG',
    Área_Interes                 VARCHAR(255)                            NOT NULL                    COMMENT 'Áreas en las que el usuario está interesado en colaborar',
    Especialización_Cursos       TEXT                                        NULL                    COMMENT 'Especializaciones o cursos relevantes para el cargo del coordinador',
    Experiencia_Laboral          INT                                         NULL                    COMMENT 'Años de experiencia laboral del coordinador',
    Experiencia_Sector_Educativo TEXT                                        NULL                    COMMENT 'Experiencia específica en el sector educativo o con ONGs',
    Habilidades_Clave            TEXT                                        NULL                    COMMENT 'Habilidades importantes que posee el coordinador',
    Idiomas                      VARCHAR(100)                                NULL                    COMMENT 'Idiomas hablados por el coordinador',
    Función_Clave                TEXT                                        NULL                    COMMENT 'Rol y responsabilidades principales del coordinador dentro de la ONG',
    Área_Supervision             VARCHAR(255)                                NULL                    COMMENT 'Área que supervisa el coordinador',
    Capacidad_Manejo_Equipos     INT                                         NULL                    COMMENT 'Número de personas que el coordinador supervisa directamente',
    Conocimientos_Herramientas   TEXT                                        NULL                    COMMENT 'Conocimientos específicos en herramientas o software de gestión',
    Disponibilidad_Viajes        BOOLEAN DEFAULT   FALSE                     NULL                    COMMENT 'Disponibilidad del coordinador para viajes o traslados',
    Compromiso_ONG               TEXT                                        NULL                    COMMENT 'Compromiso del coordinador con la misión y visión de la organización',
    Referencias_Laborales        TEXT                                        NULL                    COMMENT 'Referencias laborales proporcionadas por el coordinador',
    Motivo_Sector_Educativo      TEXT                                        NULL                    COMMENT 'Razones personales del coordinador para trabajar en el sector educativo',
    Motivo_Voluntariado          TEXT                                    NOT NULL                    COMMENT 'Razones por las cuales el voluntario desea colaborar con la ONG',
    Comentarios_Adicionales      TEXT                                                                COMMENT 'Información adicional proporcionada por el usuario',
    Declaración_Veracidad        BOOLEAN DEFAULT   FALSE                 NOT NULL                    COMMENT 'Declaración de veracidad de la información proporcionada',
    Rol                          ENUM('Administrador', 
                                      'Coordinador', 
                                      'Voluntario')                      NOT NULL                    COMMENT 'Rol del usuario en la ONG',
    Fecha_Registro               TIMESTAMP DEFAULT   CURRENT_TIMESTAMP                               COMMENT 'Fecha en que el usuario fue registrado en el sistema'
);

-- TABLA DE PROGRAMAS EDUCATIVOS
CREATE TABLE Programas_Educativos (
    ID_Programa                 INT             PRIMARY KEY                AUTO_INCREMENT     COMMENT 'Identificador único para cada programa educativo',
    Nombre_Programa             VARCHAR(255)                    NOT NULL                      COMMENT 'Nombre del programa educativo',
    Descripcion                 TEXT                            NOT NULL                      COMMENT 'Descripción detallada del programa educativo',
    Objetivos                   TEXT                            NOT NULL                      COMMENT 'Objetivos específicos del programa',
    Publico_Objetivo            VARCHAR(255)                    NOT NULL                      COMMENT 'Grupo o comunidad a la que está dirigido el programa',
    Duracion                    INT                             NOT NULL                      COMMENT 'Duración del programa en semanas o meses',
    Fecha_Inicio                DATE                            NOT NULL                      COMMENT 'Fecha de inicio del programa',
    Fecha_Termino               DATE                            NOT NULL                      COMMENT 'Fecha de término del programa (si aplica)',
    Recursos_Necesarios         TEXT                            NOT NULL                      COMMENT 'Recursos necesarios para la implementación del programa',
    Estado                      ENUM('Planificacion', 
                                     'Ejecucion', 
                                     'Finalizado', 
                                     'Cancelado')               NOT NULL                      COMMENT 'Estado actual del programa educativo',
    ID_Usuario                  INT                             NULL                          COMMENT 'Referencia al coordinador encargado del programa',
    Resultados_Esperados        TEXT                            NOT NULL                      COMMENT 'Resultados esperados al final del programa',
    Presupuesto                 DECIMAL(10, 2)                  NOT NULL                      COMMENT 'Presupuesto asignado para el programa',
    Beneficiarios_Estimados     INT                                 NULL                      COMMENT 'Número estimado de beneficiarios del programa',
    Indicadores_Cumplimiento    TEXT                                NULL                      COMMENT 'Indicadores para medir el cumplimiento de los objetivos del programa',
    Comentarios_Adicionales     TEXT                                                          COMMENT 'Comentarios adicionales sobre el programa',
    Fecha_Registro              TIMESTAMP DEFAULT CURRENT_TIMESTAMP                           COMMENT 'Fecha en que el programa educativo fue registrado en el sistema',
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario) 
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

-- TABLA DE INFORMES Y SEGUIMIENTOS
CREATE TABLE Informes_Seguimientos (
    ID_Informe                  INT                     PRIMARY KEY     AUTO_INCREMENT  COMMENT 'Identificador único para cada informe de seguimiento',
    ID_Programa                 INT         NOT NULL                                    COMMENT 'Referencia al programa educativo asociado',
    ID_Usuario                  INT             NULL                                    COMMENT 'Referencia al coordinador encargado del informe',
    Fecha_Informe               DATE        NOT NULL                                    COMMENT 'Fecha en que se realizó el informe',
    Resumen_Informe             TEXT        NOT NULL                                    COMMENT 'Resumen del informe o seguimiento',
    Cumplimiento_Indicadores    TEXT        NOT NULL                                    COMMENT 'Análisis del cumplimiento de los indicadores del programa',
    Desafíos_Encontrados        TEXT        NOT NULL                                    COMMENT 'Desafíos o problemas encontrados durante la ejecución del programa',
    Recomendaciones             TEXT                                                    COMMENT 'Recomendaciones para mejorar o ajustar el programa',
    Comentarios_Adicionales     TEXT                                                    COMMENT 'Comentarios adicionales sobre el seguimiento',
    Fecha_Registro              TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se registró el informe en el sistema',
    FOREIGN KEY (ID_Programa) REFERENCES Programas_Educativos(ID_Programa) ON DELETE CASCADE,
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario) 
        ON DELETE SET NULL
        ON UPDATE CASCADE
);


-- TABLA DE BENEFICIARIOS ----------------------------------------------------
CREATE TABLE Beneficiarios (
    ID_Beneficiario                 INT                  PRIMARY KEY                AUTO_INCREMENT  COMMENT 'Identificador único para cada beneficiario',
    Nombre_Completo                 VARCHAR(255)                        NOT NULL                    COMMENT 'Nombre completo del beneficiario',
    Fecha_Nacimiento                DATE                                NOT NULL                    COMMENT 'Fecha en que nació el beneficiario',
    Genero                          ENUM('Masculino',
                                         'Femenino',
                                         'Otro')                        NOT NULL                    COMMENT 'Género del beneficiario',
    CURP                            VARCHAR(18)          UNIQUE         NOT NULL                    COMMENT 'Clave Única de Registro de Población del beneficiario',
    Estado_Civil                    ENUM('Soltero', 
                                         'Casado', 
                                         'Divorciado', 
                                         'Viudo', 
                                         'Otro')                                                    COMMENT 'Estado civil del beneficiario',
    Correo_Electronico              VARCHAR(255)         UNIQUE         NOT NULL                    COMMENT 'Dirección de correo electrónico del beneficiario',
    Telefono                        VARCHAR(20)                                                     COMMENT 'Número de contacto del beneficiario',
    Pais                            VARCHAR(100)                        NOT NULL                    COMMENT 'País de residencia del beneficiario',
    Estado                          VARCHAR(100)                        NOT NULL                    COMMENT 'Estado o provincia de residencia',
    Municipio                       VARCHAR(100)                        NOT NULL                    COMMENT 'Municipio de residencia',
    Colonia                         VARCHAR(100)                                                    COMMENT 'Colonia o barrio de residencia',
    Nivel_Educativo                 VARCHAR(100)                                                    COMMENT 'Nivel de educación alcanzado por el beneficiario',
    Ocupacion                       VARCHAR(100)                                                    COMMENT 'Ocupación actual del beneficiario',
    Ingresos_Mensuales              DECIMAL(10, 2)                                                  COMMENT 'Ingresos mensuales del beneficiario (si aplica)',
    Numero_Dependientes_Economicos  INT                                                             COMMENT 'Número de personas que dependen económicamente del beneficiario',
    Nombre_Contacto_Emergencia      VARCHAR(255)                                                    COMMENT 'Nombre de la persona a contactar en caso de emergencia',
    Telefono_Contacto_Emergencia    VARCHAR(20)                                                     COMMENT 'Número de teléfono del contacto de emergencia',
    Relacion_Contacto_Emergencia    VARCHAR(100)                                                    COMMENT 'Relación del beneficiario con la persona de contacto de emergencia',
    Fecha_Registro                  TIMESTAMP DEFAULT    CURRENT_TIMESTAMP                          COMMENT 'Fecha en que el beneficiario fue registrado en el sistema',
    ID_Programa                     INT                                                             COMMENT 'Referencia al programa educativo en el que participó el beneficiario',
    Historial_Participaciones       TEXT                                                            COMMENT 'Resumen de las participaciones del beneficiario en actividades',
    FOREIGN KEY (ID_Programa) REFERENCES Programas_Educativos(ID_Programa) ON DELETE SET NULL
);


-- TABLA DE REGISTRO DE ACTIVIDADES ------------------------------------------------------
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


-- TABLA DE DONANTES --------------------------------------------
CREATE TABLE Donantes (
    ID_Donante                      INT                     PRIMARY KEY                 AUTO_INCREMENT  COMMENT 'Identificador único para cada donante',
    ID_Programa                     INT                                     NOT NULL                    COMMENT 'Referencia al programa educativo de interés del donante',
    Nombre_Completo                 VARCHAR(255)                            NOT NULL                    COMMENT 'Nombre completo del donante',
    Correo_Electrónico              VARCHAR(255)            UNIQUE          NOT NULL                    COMMENT 'Dirección de correo electrónico del donante',
    Teléfono                        VARCHAR(20)                                                         COMMENT 'Número de contacto del donante',
    Monto_Donación                  DECIMAL(10, 2)                          NOT NULL                    COMMENT 'Cantidad de dinero donada',
    Frecuencia_Pago                 ENUM('Única',   
                                         'Mensual')                                                     COMMENT 'Frecuencia con la que el donante realiza sus aportaciones',
    Método_Pago                     ENUM('Tarjeta',                         
                                         'Transferencia',   
                                         'Efectivo')                        NOT NULL                    COMMENT 'Método utilizado para realizar la donación',
    Razón_Social                    VARCHAR(255)                                                        COMMENT 'Razón social del donante si es una empresa o institución',
    RFC                             VARCHAR(13) UNIQUE                                                  COMMENT 'Registro Federal de Contribuyentes (en caso de ser aplicable)',
    Domicilio_Fiscal                VARCHAR(255)                                                        COMMENT 'Dirección fiscal del donante',
    Fecha_Registro                  TIMESTAMP DEFAULT       CURRENT_TIMESTAMP                           COMMENT 'Fecha en que el donante fue registrado en el sistema',
    FOREIGN KEY (ID_Programa) REFERENCES Programas_Educativos(ID_Programa) ON DELETE CASCADE
);
