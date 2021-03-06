USE [starwars]
GO
/****** Object:  Table [dbo].[character]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[character](
	[character_id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](200) NULL,
	[height] [int] NULL,
	[mass] [int] NULL,
	[hair_color] [varchar](200) NULL,
	[skin_color] [varchar](200) NULL,
	[eye_color] [varchar](200) NULL,
	[birth_year] [varchar](100) NULL,
	[gender] [varchar](20) NULL,
	[created] [datetime] NULL,
	[edited] [datetime] NULL,
	[url] [varchar](200) NULL,
	[status] [int] NULL,
 CONSTRAINT [PK_character] PRIMARY KEY CLUSTERED 
(
	[character_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[films]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[films](
	[films_id] [int] IDENTITY(1,1) NOT NULL,
	[character_id] [int] NULL,
	[title] [varchar](500) NULL,
	[episode_id] [int] NULL,
	[director] [varchar](500) NULL,
	[producer] [varchar](500) NULL,
	[release_date] [datetime] NULL,
 CONSTRAINT [PK_films] PRIMARY KEY CLUSTERED 
(
	[films_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[species]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[species](
	[species_id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](200) NULL,
	[designation] [varchar](100) NULL,
	[average_height] [varchar](100) NULL,
	[skin_colors] [varchar](100) NULL,
	[hair_colors] [varchar](100) NULL,
	[eye_colors] [varchar](100) NULL,
	[language] [varchar](100) NULL,
	[created] [datetime] NULL,
	[url] [varchar](100) NULL,
	[character_id] [int] NULL,
 CONSTRAINT [PK_species] PRIMARY KEY CLUSTERED 
(
	[species_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[starships]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[starships](
	[startships_id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](100) NULL,
	[model] [varchar](100) NULL,
	[starship_class] [varchar](100) NULL,
	[character_id] [int] NULL,
 CONSTRAINT [PK_starships] PRIMARY KEY CLUSTERED 
(
	[startships_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[vehicles]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[vehicles](
	[vehicles_id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](200) NULL,
	[model] [varchar](200) NULL,
	[manufacturer] [varchar](200) NULL,
	[max_atmosphering_speed] [int] NULL,
	[vehicle_class] [varchar](200) NULL,
	[created] [datetime] NULL,
	[character_id] [int] NULL,
 CONSTRAINT [PK_vehicles] PRIMARY KEY CLUSTERED 
(
	[vehicles_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[character] ADD  CONSTRAINT [DF_character_status]  DEFAULT ((1)) FOR [status]
GO
/****** Object:  StoredProcedure [dbo].[characters_save]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>

--characters_save 'Luke ','172','77','blond','fair','blue','19BBY','male','2014-12-09T13:50:51.644000Z','2014-12-20T21:17:56.891000Z','https://swapi.dev/api/people/1/'
-- =============================================
CREATE PROCEDURE [dbo].[characters_save]
	@name varchar(200),
	@height int,
	@mass int,
	@hair_color varchar(200),
	@skin_color varchar(200),
	@eye_color varchar(200),
	@birth_year varchar(100),
	@gender varchar(20),
	--@created datetime,
	--@edited datetime,
	@url varchar(200)

AS
BEGIN

	SET NOCOUNT ON;

	If Not Exists(select character_id from character 
		where name = @name and height = @height and mass = @mass and hair_color = @hair_color and skin_color = @skin_color and eye_color = @eye_color
				and birth_year = @birth_year and gender = @gender and url = @url)
		Begin
	
			INSERT INTO [dbo].[character]
				   ([name]
				   ,[height]
				   ,[mass]
				   ,[hair_color]
				   ,[skin_color]
				   ,[eye_color]
				   ,[birth_year]
				   ,[gender]
				   --,[created]
				   --,[edited]
				   ,[url])
			 VALUES
				   (@name
				   ,@height
				   ,@mass
				   ,@hair_color
				   ,@skin_color
				   ,@eye_color
				   ,@birth_year
				   ,@gender
				   --,@created
				   --,@edited
				   ,@url)

			Select @@IDENTITY as id , '1' as status_code, 'Successfully Saved' as status_msg
		End
	Else
		Begin
			Select '0' as id , '-1' as status_code, 'Already Exists' as status_msg
		End

END
GO
/****** Object:  StoredProcedure [dbo].[delete_charcater]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>

-- =============================================
CREATE PROCEDURE [dbo].[delete_charcater]
	@id int
AS
BEGIN
	
	SET NOCOUNT ON;

	If @id > 0
		Update character set status = '-1' where character_id = @id


	Select 1 as status_code, 'Successfully Deleted' as status_msg
END
GO
/****** Object:  StoredProcedure [dbo].[films_save]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>

--characters_save 'Luke ','172','77','blond','fair','blue','19BBY','male','https://swapi.dev/api/people/1/'
-- =============================================
CREATE PROCEDURE [dbo].[films_save]
	@title varchar(500),
	@episode_id int,
	@director varchar(500),
	@producer varchar(500),
	@character_id int

AS
BEGIN

	SET NOCOUNT ON;

	If Not Exists(select films_id from films 
		where title = @title and episode_id = @episode_id and director = @director and producer = @producer and character_id = @character_id)
		Begin
	
			INSERT INTO [dbo].[films]
				   ([title]
				   ,[episode_id]
				   ,[director]
				   ,[producer]
				   ,[character_id])
			 VALUES
				   (@title
				   ,@episode_id
				   ,@director
				   ,@producer
				   ,@character_id)

			Select @@IDENTITY as id , '1' as status_code, 'Successfully Saved' as status_msg
		End
	Else
		Begin
			Select '0' as id , '-1' as status_code, 'Already Exists' as status_msg
		End

END
GO
/****** Object:  StoredProcedure [dbo].[get_data]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[get_data]
	
AS
BEGIN
	
	SET NOCOUNT ON;

	select character_id, name, height, mass, hair_color, skin_color, eye_color, birth_year, gender from character 
	where status = 1 
	order by character_id desc

END

GO
/****** Object:  StoredProcedure [dbo].[get_films_data]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[get_films_data]
	 @id as int
AS
BEGIN
	
	SET NOCOUNT ON;

	select films_id, title, director, producer from films 
	where character_id = @id
	order by films_id desc

END

GO
/****** Object:  StoredProcedure [dbo].[get_species_data]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[get_species_data]
	 @id as int
AS
BEGIN
	
	SET NOCOUNT ON;

	select species_id, name, designation, average_height from species 
	where character_id = @id
	order by species_id desc


END

GO
/****** Object:  StoredProcedure [dbo].[get_starships_data]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[get_starships_data]
	 @id as int
AS
BEGIN
	
	SET NOCOUNT ON;

	select startships_id, name, model, starship_class from starships 
	where character_id = @id
	order by startships_id desc

END

GO
/****** Object:  StoredProcedure [dbo].[get_vehicles_data]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[get_vehicles_data]
	 @id as int
AS
BEGIN
	
	SET NOCOUNT ON;

	select vehicles_id, name, model, manufacturer, max_atmosphering_speed, vehicle_class from vehicles 
	where character_id = @id
	order by vehicles_id desc

END

GO
/****** Object:  StoredProcedure [dbo].[save_character]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>

-- =============================================
CREATE PROCEDURE [dbo].[save_character]
	@id varchar(10),
	@name varchar(200),
	@height int,
	@mass int,
	@hair_color varchar(200),
	@skin_color varchar(200)

AS
BEGIN
	
	SET NOCOUNT ON;

	If @id = '-1'
		Begin
			INSERT INTO [dbo].[character]
				   (name
				   ,height
				   ,mass
				   ,hair_color
				   ,skin_color)
			 VALUES
				   (@name
				   ,@height
				   ,@mass
				   ,@hair_color
				   ,@skin_color)
		End
	Else
		Begin
			UPDATE [dbo].[character]
			   SET name = @name
				  ,height = @height
				  ,mass = @mass
				  ,hair_color = @hair_color
				  ,skin_color = @skin_color
			 WHERE character_id = @id
		End


	Select 1 as status_code, 'Successfully saved' as status_msg
END
GO
/****** Object:  StoredProcedure [dbo].[species_save]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>

--characters_save 'Luke ','172','77','blond','fair','blue','19BBY','male','https://swapi.dev/api/people/1/'
-- =============================================
CREATE PROCEDURE [dbo].[species_save]
	@name varchar(200),
	@designation varchar(100),
	@average_height varchar(100),
	@language varchar(100),
	@character_id int

AS
BEGIN

	SET NOCOUNT ON;

	If Not Exists(select species_id from species 
		where name = @name and designation = @designation and average_height = @average_height and language = @language
		and character_id = @character_id)
		
		Begin

			INSERT INTO [dbo].[species]
				   ([name]
				   ,[designation]
				   ,[average_height]
				   ,[language]
				   ,[character_id])
			 VALUES
				   (@name
				   ,@designation
				   ,@average_height
				   ,@language
				   ,@character_id)

			Select @@IDENTITY as id , '1' as status_code, 'Successfully Saved' as status_msg
		End
	Else
		Begin
			Select '0' as id , '-1' as status_code, 'Already Exists' as status_msg
		End

END
GO
/****** Object:  StoredProcedure [dbo].[starships_save]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>

--characters_save 'Luke ','172','77','blond','fair','blue','19BBY','male','https://swapi.dev/api/people/1/'
-- =============================================
CREATE PROCEDURE [dbo].[starships_save]
	@name varchar(100),
	@model varchar(100),
	@starship_class varchar(100),
	@character_id int

AS
BEGIN

	SET NOCOUNT ON;

	If Not Exists(select startships_id from starships 
		where name = @name and model = @model and starship_class = @starship_class 
		and character_id = @character_id)
		
		Begin

			INSERT INTO [dbo].[starships]
				   ([name]
				   ,[model]
				   ,[starship_class]
				   ,[character_id])
			 VALUES
				   (@name
				   ,@model
				   ,@starship_class
				   ,@character_id)

			Select @@IDENTITY as id , '1' as status_code, 'Successfully Saved' as status_msg
		End
	Else
		Begin
			Select '0' as id , '-1' as status_code, 'Already Exists' as status_msg
		End

END
GO
/****** Object:  StoredProcedure [dbo].[vehicles_save]    Script Date: 05-02-2022 00:39:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>

--characters_save 'Luke ','172','77','blond','fair','blue','19BBY','male','https://swapi.dev/api/people/1/'
-- =============================================
CREATE PROCEDURE [dbo].[vehicles_save]
	@name varchar(200),
	@model varchar(100),
	@manufacturer varchar(200),
	@max_atmosphering_speed int,
	@vehicle_class varchar(200),
	@character_id int

AS
BEGIN

	SET NOCOUNT ON;

	If Not Exists(select vehicles_id from vehicles 
		where name = @name and model = @model and manufacturer = @manufacturer and max_atmosphering_speed = @max_atmosphering_speed
		and character_id = @character_id and vehicle_class = @vehicle_class)
		
		Begin

			INSERT INTO [dbo].[vehicles]
				   ([name]
				   ,[model]
				   ,[manufacturer]
				   ,[max_atmosphering_speed]
				   ,[vehicle_class]
				   ,[character_id])
			 VALUES
				   (@name
				   ,@model
				   ,@manufacturer
				   ,@max_atmosphering_speed
				   ,@vehicle_class
				   ,@character_id)

			Select @@IDENTITY as id , '1' as status_code, 'Successfully Saved' as status_msg

		End
	Else
		Begin
			Select '0' as id , '-1' as status_code, 'Already Exists' as status_msg
		End


END
GO
