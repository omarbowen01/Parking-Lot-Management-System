CREATE VIEW uvw_parking_slip 
AS
(
SELECT *, TIME(ENTRY_TIME) FROM parking_slip
)