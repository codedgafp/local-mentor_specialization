/*
 Remove all H5P owners from all courses.
 */
UPDATE mdl_files
SET userid = null
WHERE id IN (SELECT f.id
             FROM mdl_files f
                      JOIN mdl_context c ON c.id = f.contextid
             WHERE f.mimetype = 'application/zip.h5p'
               AND (c.contextlevel = 50 OR c.contextlevel = 70 or c.contextlevel = 80))