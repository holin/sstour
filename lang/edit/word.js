function insertStr(sAction) {
	var oRTE = getFrameNode(sRTE);
	oRTE.focus();
	oRTE.document.execCommand("InsertImage", false, FacePath + sAction +".gif");
	oRTE.focus();
}