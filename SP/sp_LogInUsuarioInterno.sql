USE [NORMA35]
GO
/****** Object:  StoredProcedure [dbo].[sp_LogInUsuarioInterno]    Script Date: 25/10/2019 02:05:56 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER PROCEDURE [dbo].[sp_LogInUsuarioInterno]
@CodVerificacion VARCHAR(max)

AS
BEGIN

	SELECT T1.CodUsuario,T1.Nombre,T1.ApPaterno,T1.ApMaterno,T1.CorreoUsu,T1.Usuario,T1.Perfil
		 from tbl_Usuarios t1 WHERE t1.CodVerificacion = @CodVerificacion and T1.Status = 1 
END
