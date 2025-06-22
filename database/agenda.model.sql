CREATE TABLE IF NOT EXISTS agenda (
    id SERIAL PRIMARY KEY,
    meeting_id INTEGER NOT NULL REFERENCES meetings(id) ON DELETE CASCADE,
    topic VARCHAR(150) NOT NULL,
    presenter VARCHAR(100),
    order_number INTEGER,
    notes TEXT
);