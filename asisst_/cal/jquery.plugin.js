'])" />
          </xsl:otherwise>
      </xsl:choose>
    </xsl:variable>

    <!-- Count the total number of issues that are blocking setup -->
    <xsl:variable name="HardBlocks" select="$DeviceHardBlocks + $ProgramHardBlocks + $PluginHardBlocks" />

    <!-- These are not hard blocks. These appear as warnings (items to review) -->
    <xsl:variable name="BadPrograms" select="count(wica:Programs/wica:Program[wica:CompatibilityInfo/@Status='WontWork' and wica:CompatibilityInfo/@BlockingType!='WebHardBlock' and @isDuplicate='0']) +
                                                      count(wica:Programs/wica:Program[wica:CompatibilityInfo/@MigXmlType='Removed' and wica:CompatibilityInfo/@BlockingType!='WebHardBlock']) +
                                                      count(wica:Programs/wica:Program[wica:CompatibilityInfo/@MigXmlType='NeedsReinstall' and wica:CompatibilityInfo/@BlockingType!='WebHardBlock']) +
                                                      count(wica:Programs/wica:Program[wica:CompatibilityInfo/@StatusDetail='UpgradeBlockCanReinstall' and wica:CompatibilityInfo/@BlockingType!='WebHardBlock']) +
                                                      count(wica:Programs/wica:Program[wica:CompatibilityInfo/@StatusDetail='UpgradeBlockUntilUpdate' and wica:CompatibilityInfo/@BlockingType!='WebHardBlock']) +
                                                      count(wica:Programs/wica:Program[wica:CompatibilityInfo/@Status='RequireAction' and wica:CompatibilityInfo/@BlockingType!='WebHardBlock' and @isDuplicate='0'])" />


    <!-- These are not hard blocks. These appear as warnings (items to review) -->
      <xsl:variable name="BadDevices" select="count(wica:Hardware/wica:HardwareItem[wica:CompatibilityInfo/@BlockingType='Soft']) +
                                                count(wica:Devices/wica:Device[wica:CompatibilityInfo/@Status='WontWork' and wica:CompatibilityInfo/@BlockingType!='Hard' and @IsActive='1' and @Excluded='Never']) +
                                                count(wica:Devices/wica:Device[wica:CompatibilityInfo/@Status='RequireAction' and wica:CompatibilityInfo/@BlockingType!='Hard' and @Excluded='Never'])" />

    <!-- Plugin warnings (items to review) -->
    <xsl:variable name="BadPlugins">
        <xsl:choose>
            <xsl:when test="$StandaloneSetup='1'">
                <xsl:value-of select="'0'" />
            </xsl:when>
            <xsl:otherwise>
                <xsl:value-of select="count(wica:Plugins/wica:Plugin[wica:CompatibilityInfo/@BlockingType!='Hard'])" />
            </xsl:otherwise>
        </xsl:choose>
    </xsl:variable>

    <!-- Calculate total number of warnings -->
    <xsl:variable name="AttentionRequiredIssues" select="$BadPrograms + $BadDevices + $BadPlugins" />
      
    <!-- Count compatible items -->
    <xsl:variable name="GoodPrograms" select="count($ReportNode/wica:Programs/wica:Program[(wica:CompatibilityInfo/@Status='Works' or wica:CompatibilityInfo/@MigXmlType='Fixed') and wica:CompatibilityInfo/@BlockingType!='WebHardBlock'])" />
    <xsl:variable name="GoodDevices" select="count($ReportNode/wica:Devices/wica:Device[wica:CompatibilityInfo/@Status='Works' and wica:CompatibilityInfo/@BlockingType!='Hard' and @Excluded='Never'])" />

    <!-- Total number of compatible items -->
    <xsl:variable name="CompatibleItems" select="$GoodPrograms + $GoodDevices" />
      
      
      
      <!-- Storing some useful strings in variables -->
      <xsl:variable name="ProgramUninstallReinstallFooter">
          <xsl:call-template name="RenderString">
              <xsl:with-param name="StringID">Solution_ReinstallLink</xsl:with-param>
              <xsl:with-param name="Arg1" select="$UplevelEdition"/>
          </xsl:call-template>
      </xsl:variable>
      <xsl:variable name="ProgramBlockUpgradeUntilUpdateFooter">
          <xsl:call-template name="GetString">
              <xsl:with-param name="id">Solution_BlockUpgradeUntilUpdateLink</xsl:with-param>
          </xsl:call-template>
      </xsl:variable>
      <xsl:variable name="ProgramAppWontWork">
          <xsl:call-template name="GetString">
              <xsl:with-param name="id">Detail_AppWontWorkFooter</xsl:with-param>
          </xsl:call-template>
      </xsl:variable>
      <xsl:variable name="ProgramAppWontWorkAndMigrate">
          <xsl:choose>
              <xsl:when test="$StandaloneSetup='1'">
                  <xsl:call-template name="RenderString">
                      <xsl:with-param name="StringID">Detail_AppWontWorkAndMigrateFooter</xsl:with-param>
                      <xsl:with-param name="Arg1" select="$UplevelEdition"/>
                  </xsl:call-template>
              </xsl:when>
              <xsl:otherwise>
                  <xsl:call-template name="GetString">
                      <xsl:with-param name="id">Detail_AppWontWorkFooter</xsl:with-param>
                  </xsl:call-template>
              </xsl:otherwise>
          </xsl:choose>
      </xsl:variable>
      <xsl:variable name="DeviceWontWork">
          <xsl:call-template name="GetString">
              <xsl:with-param name="id">Detail_DeviceWontWorkFooter</xsl:with-param>
          </xsl:call-template>
      </xsl:variable>

    <!-- Show the list of hard blocks if any (issues preventing you from upgrading) -->
    <xsl:if test="$HardBlocks > 0">
        <div id="PreventingUpgradeHeader" class="DetailHeader">
            <xsl:call-template name="GetString">
                <xsl:with-param name="id">Detial_PreventingUpgradeHeader</xsl:with-param>
            </xsl:call-template>
            <br />
            <xsl:element name="a">
                <xsl:attribute name="href">
                    <xsl:call-template name="GetString">
                        <xsl:with-param name="id">Detail_PreventingUpgradeMoreInfoUrl</xsl:with-param>
                    </xsl:call-template>
                </xsl:attribute>
                <xsl:call-template name="GetString">
                    <xsl:with-param name="id">Solution_MoreInfoLink</xsl:with-param>
                </xsl:call-template>
            </xsl:element>
        </div>
        <table id="PreventingUpgradeList" class="DetailList">
            <xsl:if test="$StandaloneSetup='0'">
                <xsl:apply-templates select="$ReportNode/wica:Plugins/wica:Plugin[wica:CompatibilityInfo/@BlockingType='Hard']" />
            </xsl:if>
            <xsl:apply-templates select="$ReportNode/wica:Hardware/wica:HardwareItem[wica:CompatibilityInfo/@BlockingType = 'Hard']">
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition"/>
            </xsl:apply-templates>
            <!-- Custom messages for different types of program blocks -->
            <xsl:apply-templates select="$ReportNode/wica:Programs/wica:Program[wica:CompatibilityInfo/@Status='WontWork' and wica:CompatibilityInfo/@BlockingType='WebHardBlock']">
                <xsl:with-param name="SavePrintMode" select="$SavePrintMode" />
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition" />
            </xsl:apply-templates>
            <xsl:apply-templates select="$ReportNode/wica:Programs/wica:Program[wica:CompatibilityInfo/@MigXmlType='Removed' and wica:CompatibilityInfo/@BlockingType='WebHardBlock']">
                <xsl:with-param name="SavePrintMode" select="$SavePrintMode" />
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition" />
            </xsl:apply-templates>
            <xsl:apply-templates select="$ReportNode/wica:Programs/wica:Program[wica:CompatibilityInfo/@MigXmlType='NeedsReinstall' and wica:CompatibilityInfo/@BlockingType='WebHardBlock']">
                <xsl:with-param name="SavePrintMode" select="$SavePrintMode" />
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition" />
            </xsl:apply-templates>
            <xsl:apply-templates select="$ReportNode/wica:Programs/wica:Program[wica:CompatibilityInfo/@StatusDetail='UpgradeBlockCanReinstall' and wica:CompatibilityInfo/@BlockingType='WebHardBlock']">
                <xsl:with-param name="SavePrintMode" select="$SavePrintMode" />
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition" />
            </xsl:apply-templates>
            <xsl:apply-templates select="$ReportNode/wica:Programs/wica:Program[wica:CompatibilityInfo/@StatusDetail='UpgradeBlockUntilUpdate' and wica:CompatibilityInfo/@BlockingType='WebHardBlock']">
                <xsl:with-param name="SavePrintMode" select="$SavePrintMode" />
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition" />
            </xsl:apply-templates>
            <xsl:apply-templates select="$ReportNode/wica:Programs/wica:Program[wica:CompatibilityInfo/@Status='RequireAction' and wica:CompatibilityInfo/@BlockingType='WebHardBlock' and wica:CompatibilityInfo/@StatusDetail!='UpgradeBlockCanReinstall' and wica:CompatibilityInfo/@StatusDetail!='UpgradeBlockUntilUpdate']">
                <xsl:with-param name="SavePrintMode" select="$SavePrintMode" />
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition" />
            </xsl:apply-templates>
            <!-- This Program template should account for any program hard block not processed above -->
            <xsl:apply-templates select="$ReportNode/wica:Programs/wica:Program[wica:CompatibilityInfo/@BlockingType='WebHardBlock' and wica:CompatibilityInfo/@Status!='WontWork' and wica:CompatibilityInfo/@MigXmlType!='Removed' and wica:CompatibilityInfo/@MigXmlType!='NeedsReinstall' and wica:CompatibilityInfo/@Status!='RequireAction' and wica:CompatibilityInfo/@StatusDetail!='UpgradeBlockCanReinstall' and wica:CompatibilityInfo/@StatusDetail!='UpgradeBlockUntilUpdate']">
                <xsl:with-param name="SavePrintMode" select="$SavePrintMode" />
                <xsl:with-param name="UplevelEdition" select="$UplevelEdition" />
            </xsl:apply-templates>
            <xsl:apply-templates select="$ReportNode/wica:Devices/wica:Device[wica:CompatibilityInfo/@Status='RequireAction' and wica:CompatibilityInfo/@BlockingType='Hard' and @Excluded='Never']" />
            <!-- This Device template should account for any device hard block not processed above -->
            <xsl:apply-templates select="$ReportNode/wica:Devices/wica:Device[wica:CompatibilityInfo/@BlockingType='Hard' and (wica:CompatibilityInfo/@Status!='RequireAction' or @Excluded!='Never')]" />
        </table>
    </xsl:if>

    <!-- Show the list of warnings if any (items for you to review) -->
    <xsl:if test="$AttentionRequiredIssues > 0">
      <div id="WontWorkHeader" class="DetailHeader">
        <xsl:call-template name="GetString">
          <xsl:with-param name="id">Detail_NeedAttentionHeader</xsl:with-param>
        </xsl:call-template>
      </div>
      <table id="WontWorkList" class="DetailList">
        <xsl:apply-templates select="$ReportNode/wica:Hardware/wica:HardwareItem[wica:CompatibilityInfo/@BlockingType = 'Soft' and @HardwareType='Setup_EditionDowngrade']" mode="Link">
          <xsl:with-param name="UplevelEdition" select="$UplevelEdition"/>
        </xsl:apply-templates>
        <xsl:if test="$StandaloneSetup='0'">
          <xsl:apply-templates select="$ReportNode/wica:Plugins/wica:Plugin[wica:Co