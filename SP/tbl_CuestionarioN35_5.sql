USE [NORMA35]
GO

/****** Object:  Table [dbo].[tbl_CuestionarioN35_1]    Script Date: 25/10/2019 02:16:01 a. m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[tbl_CuestionarioN35_5](
	[CodEncuesta] [int] NOT NULL,
	[CodUsuario] [int] NOT NULL,
	[P1_1] [nvarchar](2) NOT NULL,
	[P1_2] [nvarchar](2) NOT NULL,
	[P1_3] [nvarchar](2) NOT NULL,
	[P1_4] [nvarchar](2) NOT NULL,
	[P1_5] [nvarchar](2) NOT NULL,
	[P1_6] [nvarchar](2) NOT NULL,
	[P1_7] [nvarchar](2) NULL,
	[P1_8] [nvarchar](2) NULL,
	[P1_9] [nvarchar](2) NULL,
	[P1_10] [nvarchar](2) NULL,
	[P1_11] [nvarchar](2) NULL,
	[P1_12] [nvarchar](2) NULL,
	[P1_13] [nvarchar](2) NULL,
	[P1_14] [nvarchar](2) NULL,
	[Fecha_C5] [date] NOT NULL,
	[Hora_C5] [time](7) NOT NULL,
	[ContestadoC5] [int] NOT NULL
) ON [PRIMARY]

GO


