DROP VIEW IF EXISTS JoinedDocument;

CREATE VIEW JoinedDocument AS

SELECT * FROM Document, DocumentType, Format
	WHERE Document.DocumentType_DocumentTypeID = DocumentType.DocumentTypeID
	AND Document.Format_FormatID = Format.FormatID;



DROP VIEW IF EXISTS JoinedTag;

CREATE VIEW JoinedTag AS

SELECT *
	FROM TaskTag
	JOIN Tag
	ON TaskTag.Tag_TagID = Tag.TagID;


DROP VIEW IF EXISTS JoinedTask;

CREATE VIEW JoinedTask AS

SELECT TaskID,User_UserID,Title,TaskTypeVal,Description,NumPages,
NumWords,FormatVal,DocumentTypeVal,SubjectName,
DocumentURL,Claim,Completion,StatusVal,ClaimantID

FROM Task
LEFT JOIN Deadline
ON Task.TaskID = Deadline.Task_TaskID
LEFT JOIN JoinedDocument
ON Task.TaskID = JoinedDocument.Task_TaskID
LEFT JOIN TaskType
ON Task.TaskType_TaskTypeID = TaskType.TaskTypeID
LEFT JOIN Subject
ON Task.Subject_SubjectID = Subject.subjectID
LEFT JOIN Status
ON Task.Status_StatusID = Status.StatusID;
