ALTER TABLE floor
ADD CONSTRAINT CK_FLOOR_NUMBER_OF_BLOCKS CHECK(NUMBER_OF_BLOCKS >=0 AND NUMBER_OF_BLOCKS <= 100);