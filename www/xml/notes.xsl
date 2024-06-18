<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

 
  <xsl:template match="notes">
    <html>
      <body>
        <div class="container mt-4">
          <!-- Apply templates to each note -->
          <xsl:apply-templates select="note"/>
        </div>
      </body>
    </html>
  </xsl:template>

  <!-- Template to match each note element -->
  <xsl:template match="note">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">
          <xsl:value-of select="title"/>
        </h5>
        <p class="card-text">
          <strong>Author:</strong> <xsl:value-of select="author"/><br/>
          <strong>Content:</strong><br/>
          <xsl:value-of select="content"/>
        </p>
        <div class="text-muted">
          <small>
            <strong>Created:</strong> <xsl:value-of select="created_at"/><br/>
            <strong>Updated:</strong> <xsl:value-of select="updated_at"/>
          </small>
        </div>
      </div>
    </div>
  </xsl:template>

</xsl:stylesheet>
