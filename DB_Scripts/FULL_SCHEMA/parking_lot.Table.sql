CREATE TABLE parking_lot (
    PARKING_LOT_ID INT PRIMARY KEY AUTO_INCREMENT,
    NUMBER_OF_BLOCKS INT,
    IS_SLOT_AVAILABLE VARCHAR(1),
    ADDRESS VARCHAR(126),
    ZIP_CODE VARCHAR(30),
    IS_REENTRY_ALLOWED VARCHAR(1)
)