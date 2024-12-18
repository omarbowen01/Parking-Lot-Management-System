CREATE TABLE parking_slip (
    PARKING_SLIP_ID INT PRIMARY KEY AUTO_INCREMENT,
    PARKING_SLOT_RESERVATION INT,
    ENTRY_TIME DATETIME,
    EXIT_TIME DATETIME,
    BASIC_COST DECIMAL(10,2),
    PENALTY DECIMAL(10,2),
    TOTAL_COST DECIMAL(10,2),
    IS_PAID VARCHAR(1),
    PARKING_LOT_ID INT,
    FLOOR_ID INT,
    SLOT_ID INT,
    CUSTOMER_ID INT,
    CONSTRAINT FK_PARKING_SLIP_PARKING_LOT_ID FOREIGN KEY(PARKING_LOT_ID) REFERENCES parking_lot(PARKING_LOT_ID),
    CONSTRAINT FK_PARKING_SLIP_FLOOR_ID FOREIGN KEY(FLOOR_ID) REFERENCES floor(FLOOR_ID),
    CONSTRAINT FK_PARKING_SLIP_SLOT_ID FOREIGN KEY(SLOT_ID) REFERENCES parking_slot(SLOT_ID),
    CONSTRAINT FK_PARKING_SLIP_CUSTOMER_ID FOREIGN KEY(CUSTOMER_ID) REFERENCES customer(CUSTOMER_ID)
)